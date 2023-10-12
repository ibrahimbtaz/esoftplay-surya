<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$config = $output['config'];
$arr    = $output['data'];
foreach ((array) $arr as $data) {
  // pr($data);
  // pr($config);
?>
  <article class="featured">
    <div class="overlay"></div>
    <figure>
      <?php echo (!empty($config['thumbnail']) && !empty($data['image'])) ? content_src($data['image'], ' class="" title="' . $data['title'] . '"') : ''; ?>
      <!-- <img src="/surya/templates/magz-master/images/news/img04.jpg" alt="Sample Article"> -->
    </figure>
    <div class="details">
      <?php
      $link = content_link($data['id'], $data['title']);
      if ($config['title']) {
        if ($config['title_link']) {
      ?>
          <!-- <div class="category"><a href="category.html">Computer</a></div> -->
          <div class="category"><a href="<?php echo $link; ?>" title="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a></div>
        <?php
        } else {
        ?>
          <div class="category"><?php echo $data['title']; ?></div>
      <?php
        }
      }
      ?>
      <h1><a href="single.html"> <?php echo substr($data['content'], 0, 80) ?></a></h1>
      <div class="time"><?php echo $data['created'] ?></div>
    </div>
  </article>
<?php
}
