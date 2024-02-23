<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Traits\DzMeSettings;
use App\Http\Traits\DzCptTrait;
use App\helper\HelpDesk;
use Hexadog\ThemesManager\Facades\ThemesManager;

class MagicEditorsController extends Controller
{
    use DzMeSettings, DzCptTrait ;

    public function admin_use_me(Request $request)
    {
        $currentTheme = config('Theme.select_theme') ? explode("/",config('Theme.select_theme'))[1] : '' ;

		$allElements = $this->getAllSettings();
        $allCommonElements = $allActiveThemeElements = array();
		foreach($allElements as $key => $value)
		{
			
			if(strpos($key, 'w3cms') !== false )
			{
				$allCommonElements[] = $value;
			}	
			
			/* Get all active theme elements  */
			if(strpos($key, $currentTheme) !== false)
			{
				$allActiveThemeElements[] = $value;
			}	
		}
		
		$allRequiredElementsForEditor = array_merge($allCommonElements, $allActiveThemeElements);
		
		$allElements = $allRequiredElementsForEditor;
		
        $allElementsCategories  = array_unique(array_column($allElements, 'category', 'base'));
		return view('admin.magic_editor.admin_use_me', compact('allElements', 'allElementsCategories'));
    }

    public function admin_edit_section(Request $request, $elementId=null) {


        $elementData = array();

        if($request->isMethod('post') && !empty($request->input('elementData')))
        {
            $elementData = $request->input('elementData');
        }
        $elementId = $request->input('elementId');
        $element_index = $request->input('element_index');
        
        $element = array();

        if(!empty($elementId))
        {
            $allElements = $this->getAllSettings();
            $element = $allElements[$elementId];
            $elementTabs = array_values(array_unique(array_column($element['params'], 'group')));
        }
		
        return view('admin.magic_editor.admin_edit_section', compact('element', 'elementData', 'element_index', 'elementTabs'));
    }

    public function admin_update_element(Request $request) {

        $new_request = array_filter($request->all());


        if(!empty($new_request['grouped']['%KEY%']))
        {
            unset($new_request['grouped']['%KEY%']);
        }
        
        if(!empty($_FILES['grouped']['name']['%KEY%']))
        {
            unset($_FILES['grouped']['name']['%KEY%']);
        }
        
        foreach ($new_request as $key => $value) {

            if(is_array($value))
            {
                foreach ($value as $subKey => $subValue) {
                    if(isset($_FILES['grouped']['name'][$subKey]) && !empty($_FILES['grouped']['name'][$subKey]))
                    {
                        /* For Image Files */
                        foreach($_FILES['grouped']['name'][$subKey] as $fileKey => $fileValue)
                        {
                            /* $fileKey have field name key */ 
                            if(is_array($_FILES['grouped']['name'][$subKey][$fileKey]))
                            {
                                $groupedMultiImages = array();
                                foreach($fileValue as $keyfV => $valuefV )
                                {

                                    $file = $new_request['grouped'][$subKey][$fileKey];

                                    if (!empty($file) && !is_string($file)) {
                                        $OriginalName = $file->getClientOriginalName();
                                        $fileName = time().'.'.$OriginalName;
                                        $fileWithPath = $file->storeAs('public/page-images/magic-editor', $fileName);

                                        if($fileName)
                                        {
                                            $groupedMultiImages[] = $fileName;
                                        }
                                    }
                                
                                }

                                if(!empty($groupedMultiImages))
                                {
                                    if(isset($new_request['grouped'][$subKey][$fileKey]) && !empty($new_request['grouped'][$subKey][$fileKey]))
                                    {
                                        $groupedMultiImages = array_merge($groupedMultiImages, explode(',', $new_request['grouped'][$subKey][$fileKey]));
                                    }
                                    $new_request['grouped'][$subKey][$fileKey] = implode(',', $groupedMultiImages);
                                }
                                                            
                            }
                            else{

                                $file = $new_request['grouped'][$subKey][$fileKey];
                                if (!empty($file) && !is_string($file)) {
                                    
                                    $OriginalName = $file->getClientOriginalName();
                                    $fileName = time().'.'.$OriginalName;
                                    $fileWithPath = $file->storeAs('public/page-images/magic-editor', $fileName);

                                    if($fileName)
                                    {
                                        $new_request['grouped'][$subKey][$fileKey] = $fileName;
                                    }
                                }
                                                
                            }
                        }
                    }

                    foreach ($request->allFiles() as $fileKey => $fileValue) 
                    {
                        if($fileKey != 'grouped')
                        {
                            if(!empty($request[$fileKey]) && is_array($request[$fileKey]))
                            {
                                $imageArr = array();
                                $imageCount = count($request[$fileKey]);

                                for ($i=0; $i < $imageCount; $i++) {

                                    if(!empty($request[$fileKey][$i]))
                                    {
                                        $image = $request[$fileKey][$i];
                                        $OriginalName = $image->getClientOriginalName();
                                        $fileName = time().'.'.$OriginalName;
                                        $fileWithPath = $image->storeAs('public/page-images/magic-editor', $fileName);
                                        
                                        $imageArr[] = $fileName;
                                        
                                    }

                                }
                                
                                if(!empty($imageArr))
                                {
                                    $new_request[$fileKey] = implode(',', $imageArr);
                                }
                            } 
                            else {
                                if(!empty($request[$fileKey]))
                                {
                                    $image = $request[$fileKey];
                                    $OriginalName = $image->getClientOriginalName();
                                    $fileName = time().'.'.$OriginalName;
                                    $fileWithPath = $image->storeAs('public/page-images/magic-editor', $fileName);
                                    if ($fileWithPath) {
                                        $new_request[$fileKey] = $fileName;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            else {
                if ($request->hasFile($key)) {

                    $file = $request->file($key);
                    $OriginalName = $file->getClientOriginalName();
                    $fileName = time().'.'.$OriginalName;
                    $path = $request->file($key)->storeAs('public/page-images/magic-editor', $fileName);
                    $new_request[$key] = $fileName;
                }
            }
            
        } 

        $result = array('data' => json_encode($new_request));

        echo json_encode($result);
        exit();

    }

    public function admin_remove_image(Request $request)
    {

        if($request->isMethod('post') && !empty($request->imageName) && !empty($request->allImagesName))
        {
            $imageName =  $request->imageName;
            $allImagesName = explode(',', $request->allImagesName);

            $filepath = storage_path('app/public/page-images/magic-editor/').$request->imageName;
            if (($key = array_search($imageName, $allImagesName)) !== false) {

                unset($allImagesName[$key]);
                if(\File::exists($filepath))
                {
                    \File::delete($filepath);
                }
            }
            $allImagesName = implode(',', $allImagesName);
            echo json_encode(array('status' => true, 'result' => $allImagesName));
        }
        else
        {
            echo json_encode(array('status' => false));
        }
    }

    public function get_page_content(Request $request, $page_id=null) 
    {
        $settingsElement = $editorElement = array();
        $content = Page::Where('id', $page_id)->value('content');

        if(empty($content))
        {
            echo __('Page not found.');
            exit;
        }
        
        $decodeContent = htmlspecialchars_decode($content);
                
        if(strpos($decodeContent, '<%ME%>') > 0 || strpos($decodeContent, '<%ME-EL%>') > 0)
        {
            $elementData = explode('<%ME%>', $decodeContent);
            $elementData = array_filter($elementData);

            $allElements = $this->getAllSettings();
            
            /* Page Section Elements Loop Start */
            foreach($elementData as $key => $elements)
            {
                $tempElement = $conditions = $fields = $contain = array();
                $elements = str_replace('"', '', rtrim(ltrim($elements, '['), ']'));
                
                $chanksEl = explode('<%ME-EL%>' , $elements);
                $totalCountChanks = count($chanksEl);
                $element_category = isset($allElements[$chanksEl[0]]['category']) ? $allElements[$chanksEl[0]]['category'] : '';                
                
                /* Elements Key Values Sepretion Start */
                for($i = 1; $i < $totalCountChanks; $i++ )
                {
                    $fields = explode("=", $chanksEl[$i]);
                    
                    if(!empty($fields[0]) && !empty($fields[1]))
                    {
                        $tempElement['base'] = $chanksEl[0];
                        if($fields[0] == 'grouped')
                        {
                            $grouped = urldecode($fields[1]);
                            $tempElement[$fields[0]][] = (array) json_decode($grouped);
                        }
                        else
                        {
                            $tempElement[$fields[0]] = $fields[1];
                        }
                    }
                }

                $settingsElement[$tempElement['base']] = $tempElement;
            }
            
            $content = $settingsElement;
            /* Page Section Elements Loop End */
            
        }
        else
        {
            $content = $decodeContent;
        }
        
        $data = array('Result'=>array(
                            'status' => true,
                            'data' => $content
                            )
                      );

        echo "<pre>".json_encode($data, JSON_PRETTY_PRINT)."<pre/>";
        exit;
    }

    public function get_all_cpt()
    {
        return Blog::WherePublishBlog(config('w3cpt.post_type'))->pluck('title', 'id')->toArray();
    }

    public function get_post_by_cpt($post_type)
    {
        return Blog::WherePublishBlog($post_type)->pluck('title', 'id')->toArray();
    }

    public function get_post_taxonomy($taxonomy)
    {
        return BlogCategory::where(['type' => $taxonomy])->pluck('title', 'id')->toArray();
    }

    public function get_post_by_category(Request $request)
    {

        $categoryId = $request->content;
        $param_name = $request->param_name;
        $resultQuery = Blog::query();

        if($categoryId) {
            $resultQuery->whereHas('blog_categories',function($query) use($categoryId){
                $query->where('blog_categories.slug', '=', $categoryId);
            });
        }
        $contentObj = $resultQuery->get();
        return view('admin.magic_editor.Elements.ajax_container', compact('contentObj','param_name'));
    }

    public function get_post_by_cpt_category(Request $request)
    {

        $fieldArray = array();
        $categoryId = $request->content;
        $param_name = $request->param_name;
        $element_id = $request->element_id;
        $elementData = $request->elementData;
        $resultQuery = \Modules\W3CPT\Entities\Blog::query();

        if($categoryId) {
            $resultQuery->whereHas('blog_categories',function($query) use($categoryId){
                $query->where('slug', '=', $categoryId)
                ->where('status', '!=', 3 );
            });
        }
        $fieldOptions = $resultQuery->pluck('title','slug')->toArray();
        $allElements = $this->getAllSettings();
        $element = $allElements[$element_id];
        
        
        foreach($element['params'] as $value)
        {
            if($value['param_name'] == $param_name)
            {
                $fieldArray = $value;
                break;
            }   
        }

        return view('admin.magic_editor.Elements.ajax_container', compact('fieldOptions','fieldArray','elementData','param_name'));
    }

    public function get_cpt_categories(Request $request)
    {
        $taxonomyArr = array();
        $fieldArray = array();
        $post_type = $request->content;
        $element_id = $request->element_id;
        $elementData = $request->elementData;
        $param_name = $request->param_name;
        $cpt_taxonomies = $this->getTaxonomiesByPostType($post_type);

        if ($cpt_taxonomies) {
            foreach ($cpt_taxonomies as $value) {
                $taxonomyArr[] = $value['cpt_tax_name'];
            } 
        }
        $fieldOptions = \Modules\W3CPT\Entities\BlogCategory::whereIn('type', $taxonomyArr)->pluck('title','slug');
		
		$allElements = $this->getAllSettings();
        $element = $allElements[$element_id];
		
		
		foreach($element['params'] as $value)
		{
			if($value['param_name'] == $param_name)
			{
				$fieldArray = $value;
				break;
			}	
		}

        return view('admin.magic_editor.Elements.ajax_container', compact('fieldOptions','fieldArray','elementData','param_name'));
    }

    public function ajax_load_more(Request $request)
    {
		$el_view = $request->ajax_view;
        
        if(config('Theme.select_theme'))
        {
            ThemesManager::set(config('Theme.select_theme'));
            $blogs = HelpDesk::elementPostsByArgs($request->all());
            if ($request->ajax()) {
                $html = view('website_builder.'.$el_view, compact('blogs'))->render();
                $hasMorePages = $blogs->currentPage() < $blogs->lastPage();

                return response()->json([
                    'html' => $html,
                    'has_more_pages' => $hasMorePages,
                ]);
            }
        }
    }

}
