<?php

namespace Modules\W3CPT\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;
use Stevebauman\Purify\Facades\Purify;
use App\Models\User;
use App\Http\Traits\DzCptTrait;

class Blog extends Model
{
	use HasFactory, DzCptTrait;
	
	protected $table = 'blogs';
	protected $fillable = [
		'user_id',
		'title',
		'slug',
		'content',
		'excerpt',
		'comment',
		'password',
		'status',
		'post_type',
		'visibility',
		'publish_on',
	];

	/**
	 * Blog belongs to User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	/**
	 * Blog has many Blog_meta.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function blog_meta()
	{
		return $this->hasMany(BlogMeta::class, 'blog_id', 'id');
	}

	/**
	 * Blog has one Blog Seo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function blog_seo()
	{
		return $this->hasOne(BlogSeo::class, 'blog_id', 'id');
	}

	public function blog_categories()
	{
		return $this->belongsToMany(BlogCategory::class, 'term_relationships', 'object_id', 'term_id');
	}

	public function blog_tags()
	{
		return $this->belongsToMany(BlogTag::class, 'blog_blog_tags', 'blog_id', 'blog_tag_id');
	}

	/**
	 * Blog has one Feature_img.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function feature_img()
	{
		return $this->hasOne(BlogMeta::class, 'blog_id', 'id')
					->select(['blog_id', 'title', 'value'])
					->where('title', '=', 'ximage');
	}

	/**
	 * Blog has one video.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function video()
	{
		return $this->hasOne(BlogMeta::class, 'blog_id', 'id')
					->select(['blog_id', 'title', 'value'])
					->where('title', '=', 'xvideo');
	}

	public function generateSlug($slug, $id=Null)
	{
		if (!empty($id)) {
			// for Update blog ,check same blog id
			$where  = static::where('id', '!=' ,$id)->whereSlug($slug)->exists();
		}else {
			// for create Page
			$where  = static::whereSlug($slug)->exists();
		}

		if ($where) {

			$original = $slug;
			$count = 2;

			while (static::whereSlug($slug)->exists()) {
				$slug = "{$original}-" . $count++;
			}
			return $slug;
		}
		return $slug;
	}

	public function laraBlogLink($id)
	{
		$permalink = config('Permalink.settings');
		$rewritecode = config('menu.permalink_structure');
		$blog = Blog::select('id', 'slug', 'publish_on')->with('blog_categories', 'user')->firstWhere('id', $id);

		if ($blog) {
			
			$date = explode( ' ', str_replace( array( '-', ':' ), ' ', (new Carbon($blog->publish_on))->format('Y-m-d H:i:s' )) );
			$rewritereplace = array(
				$date[0],
				$date[1],
				$date[2],
				$date[3],
				$date[4],
				$date[5],
				$blog->slug,
				optional(optional($blog->blog_categories)[0])->title,
				optional($blog->user)->fullname,
				$blog->id,
			);
			
			return $link = str_replace( $rewritecode, $rewritereplace, $permalink );
		}

	}

	public function laraBlogCategoryLink($id)
	{
		$blog_category = BlogCategory::with('blog')->firstWhere('id', $id);
		return $link = optional($blog_category)->slug;
	}
	
	
	public function laraBlogTagLink($id)
	{
		$blog_tags = BlogTag::with('blog')->firstWhere('id', $id);
		return $link = optional($blog_tags)->slug;
	}
	
	public function author($id)
	{
		$author = User::firstWhere('id', $id);
		return $name = $author->name;
	}

	public function recentBlogs($atts = array())
	{

		$limit = $atts['limit'];
		$order = $atts['order'];
		$orderby = $atts['orderby'];

		$blogs_query = Blog::with('blog_meta', 'blog_seo', 'blog_categories', 'blog_tags', 'user');

		if(!optional(Auth::user())->hasRole(config('constants.roles.admin'))) {
			$blogs_query->where('visibility', '!=', 'Pr');
		}
		$blogs_query->where(['status' => 1])
					->where('visibility', '!=', 'Pr')
					->limit($limit)
					->orderBy($orderby, $order);
		$blogs = $blogs_query->get();
		return $blogs;

	}

	public function categoryBlogs($atts = array())
	{
		$limit = $atts['limit'];
		$order = $atts['order'];
		$orderby = $atts['orderby'];

		if(!optional(Auth::user())->hasRole(config('constants.roles.admin'))) {
			$blogcategories  = BlogCategory::withCount(['blog' => function($query) {
				$query->where('visibility', '!=', 'Pr');
			}])
			->limit($limit)
			->orderBy($orderby, $order)
			->get();
			
		}else {
			$blogcategories  = BlogCategory::withCount('blog')
			->limit($limit)
			->orderBy($orderby, $order)
			->get();
		}
		return $blogcategories;
	}

	public function archiveBlogs()
	{
		$archives_query = Blog::selectRaw('YEAR(publish_on) year, MONTH(publish_on) month, MONTHNAME(publish_on) month_name, count(*) data');
		
		if(!optional(Auth::user())->hasRole(config('constants.roles.admin'))) {
			$archives_query->where('visibility', '!=', 'Pr');
		}
		$archives_query->groupBy('year', 'month', 'month_name')
						->orderBy('month', 'asc')
						->limit(3);
		$archives = $archives_query->get();

		foreach ($archives as $archive) {
			if (strlen($archive->month) == 1) {
				$archive->month = '0'.$archive->month;
			}
		}
		return $archives;      
	}

	public function getCreatedAtAttribute( $value ) {
		return (new Carbon($value))->format(config('Reading.date_time_format'));
	}

	public function setCreatedAtAttribute( $value ) {
		$this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
	}

	public function getPublishOnAttribute( $value ) {
		return (new Carbon($value))->format(config('Reading.date_time_format'));
	}

	public function setPublishOnAttribute( $value ) {
		$this->attributes['publish_on'] = !empty($value) ? (new Carbon($value))->format('Y-m-d H:i:s') : date('Y-m-d H:i:s');
	}

	public function setSlugAttribute( $value ) {
		return $this->attributes['slug'] = $this->generateSlug($value, $this->id);
	}

	public function getContentAttribute($value)
	{
		return Purify::clean($value);
	}

	public function getBlogMeta($blog_id)
	{
		return BlogMeta::where('blog_id', '=', $blog_id)->pluck('value', 'title');
	}

/*
return custom post type list
*/
	public function getAllCpt()
	{
	   	$blogs = $this->where('post_type', '=', config('w3cpt.post_type'))->where('status', '=', 1)->pluck('id', 'slug');
	   	$taxonomies = $this->where('post_type', '=', config('w3cpt.post_type_taxo'))->where('status', '=', 1)->pluck('id');

	   	$blogMeta = $taxoMeta = array();
	   	if(!$blogs->isEmpty())
	   	{
			foreach ($blogs as $key => $value) {
				$blogMeta[$key] = $this->getBlogMeta($value);
				if(!$taxonomies->isEmpty())
			   	{
			   		$allTaxoMeta = array();
					foreach ($taxonomies as $taxoKey => $taxoValue) {
						$taxoMeta = $this->getBlogMeta($taxoValue);
						$taxonomiesArr = isset($taxoMeta['cpt_tax_post_types']) ? unserialize($taxoMeta['cpt_tax_post_types']) : array();
						if(in_array($blogMeta[$key]['cpt_name'], $taxonomiesArr))
						{
		   					$allTaxoMeta[] = $taxoMeta;
						}
					}
					$blogMeta[$key]['taxo'] = $allTaxoMeta;
			   	}

			}
	   	}
	   	return $blogMeta;

	}

	public function getPostsByPostType($post_type='')
	{
		return $this->where('post_type', '=', config('w3cpt.post_type'))->where('status', 1)->get();
	}

	public function getTaxonomiesByPostType($post_type='')
	{
		$allTaxoMeta = array();
		$allTaxonomyIds = Blog::where('post_type', '=', config('w3cpt.post_type_taxo'))->pluck('id');

		if (!$allTaxonomyIds->isEmpty()) {
			foreach($allTaxonomyIds as $taxoId)
			{
				$taxoMeta = BlogMeta::where('blog_id', '=', $taxoId)->pluck('value', 'title');
				$taxonomyCPT = isset($taxoMeta['cpt_tax_post_types']) ? unserialize($taxoMeta['cpt_tax_post_types']) : array();
				
				if (in_array($post_type, $taxonomyCPT)) {
					
					$allTaxoMeta[] = $taxoMeta;
					
				}
			}
		}
		return $allTaxoMeta;
	}

}
