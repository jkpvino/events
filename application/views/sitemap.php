<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    <!-- Product List -->
    <?php foreach($eventview as $eview) { ?>
    <url>
        <loc><?php echo base_url()."event/".$eview->etypecategory.'-'.$eview->etypename.'/'.$eview->url_key ?></loc>
        <priority>1</priority>
        <changefreq>always</changefreq>
    </url>
    <?php } ?>
    <?php foreach($eventview as $eview) { ?>
    <url>
        <loc><?php echo base_url()."events/browse/".$eview->etypename ?></loc>
        <priority>1</priority>
        <changefreq>always</changefreq>
    </url>
    <?php } ?>

    <!-- Location -->
    <url>
        <loc><?php echo base_url()."events/location/india" ?></loc>
        <priority>0.5</priority>
        <changefreq>always</changefreq>
    </url>
    <?php foreach($states as $state) { ?>
    <url>
        <loc><?php echo base_url()."events/location/".$state->name ?></loc>
        <priority>0.5</priority>
        <changefreq>always</changefreq>
    </url>
    <?php } ?>    
    <?php foreach($cities as $city) { ?>
    <url>
        <loc><?php echo base_url()."events/location/".$city->name ?></loc>
        <priority>0.5</priority>
        <changefreq>always</changefreq>
    </url>
    <?php } ?>
</urlset> 