<h2 class="main-title">Programma</h2>

<div class="activity-grid">
   <article class="filter-container program-grid-item">
     <h3 class="hide">Filter</h3>
     <form class="filter" action="index.php?page=programma" method="post">
       <div class="filter-sentence">
         <input class="hide" type="text" name="action" value="action">
         <span>Ik zoek een activiteit </span><span>rond</span>
         <input class="filter-input" type="search" name="tag" placeholder="van alles" list="tagList">
         <datalist id="tagList">
           <?php foreach($tags as $tag):?>
             <option value="<?php echo $tag['tag'] ?>">
           <?php endforeach;?>
         </datalist>
         <span>op</span>
         <div class="input-select">
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
         </div>
         <span>in</span>
         <input class="filter-input" type="search" name="city" placeholder="een stad" list="cityList"><span>.</span>
         <datalist id="cityList">
           <?php $cityList = [] ?>
           <?php foreach($events as $event):?>
             <?php if(!in_array($event['city'], $cityList)){
               $cityList[] = $event['city']?>
               <option value="<?php echo $event['city'] ?>">
             <?php } ?>
           <?php endforeach;?>
         </datalist>
       </div>
       <div class="filter-buttons">
         <button class="filter-button" type="submit">Filter</button>
         <a class="remove-filter-button" href="index.php?page=programma">Filter verwijderen</a>
       </div>
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
          <p class="time"><?php echo date('d/m', strtotime($event['start']));?><?php if(date('d/m', strtotime($event['start'])) != date('d/m', strtotime($event['end']))) echo ' - ' . date('d/m', strtotime($event['end']));?></p>
          <p class="place"><?php echo $event['city']; ?></p>
        </div>
      </article>
    </a>
  <?php endforeach;?>
</div>
