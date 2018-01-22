<h2 class="main-title">Programma</h2>

<div class="activity-grid">
   <article class="filter-container program-grid-item">
     <h3 class="hide">Filter</h3>
     <form class="filter" action="index.php?page=programma" method="post">
       <input class="hide" type="text" name="action" value="action">
       Ik zoek een activiteit rond
       <input class="filter-input" type="search" name="tag" placeholder="van alles">
       op
       <select class="filter-input" name="day">
         <option class="placeholder" value="">een dag</option>
         <option value="2018-09-16">Zondag 16/9</option>
         <option value="2018-09-17">Maandag 17/9</option>
         <option value="2018-09-18">Dinsdag 18/9</option>
         <option value="2018-09-19">Woensdag 19/9</option>
         <option value="2018-09-20">Donderdag 20/9</option>
         <option value="2018-09-21">Vrijdag 21/9</option>
         <option value="2018-09-22">Zaterdag 22/9</option>
       </select>
       in
       <input class="filter-input" type="search" name="city" placeholder="een stad">.
       <button class="filter-button" type="submit">Filter</button>
       <a href="#">Filter verwijderen</a>
     </form>
   </article>
  <?php foreach($events as $event): ?>
    <a class="grid-item-link" href="index.php?page=event-detail&amp;id=<?php echo $event['id'];?>">
      <article class="program-grid-item">
        <picture>
          <img class="grid-image" src="assets/img/ANT1-grid-290w.jpg" alt="<?php echo $event['title']; ?>">
        </picture>
        <ul class="tags">
          <li class="tag"><?php echo $event['tags'][1]['tag'];?></li>
          <li class="tag"><?php echo $event['tags'][2]['tag'];?></li>
          <li class="tag"><?php echo $event['tags'][3]['tag'];?></li>
        </ul>
        <div class="activity-info">
          <header><h3 class="title"><?php echo $event['title']; ?></h3></header>
          <p class="time"><?php echo $event['start'];?> - <?php echo $event['end'];?></p>
          <p class="place"><?php echo $event['city']; ?></p>
        </div>
      </article>
    </a>
  <? endforeach;?>
</div>
