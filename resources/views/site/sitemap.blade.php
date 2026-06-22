<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
<loc>https://www.websolutiontechnology.com/</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>1.00</priority>
</url>
<url>
<loc>https://www.websolutiontechnology.com/about-us</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>
<url>
<loc>https://www.websolutiontechnology.com/portfolio</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>

 <url>
<loc>https://www.websolutiontechnology.com/contact-us</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>
 

 <url>
<loc>https://www.websolutiontechnology.com/terms-condition</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>
 

 <url>
<loc>https://www.websolutiontechnology.com/support</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>
 

 <url>
<loc>https://www.websolutiontechnology.com/services</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>
 
<?php  
if($categoryList){
foreach($categoryList as $catValue){   ?>
<url>
<loc>{{url('services/'.$catValue->slug)}}</loc>
<lastmod>{{ \Carbon\Carbon::parse($catValue->updated_at)->toAtomString() }}</lastmod>
<priority>0.80</priority>
</url>

<?php  $serviceList = App\Services::where('status','1')->where('categories_id',$catValue->id)->get();

if($serviceList){
foreach($serviceList as $serviceValue){
?>
<url>

<loc>{{url('services/'.$catValue->slug.'/'.$serviceValue->service_slug)}}</loc>
<lastmod>{{ \Carbon\Carbon::parse($serviceValue->updated_at)->toAtomString() }}</lastmod>
<priority>0.80</priority>
</url>
<?php  } } ?>





<?php } } ?>
     
    
</urlset>