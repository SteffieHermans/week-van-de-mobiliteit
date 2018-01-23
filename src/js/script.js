{
  const $activityGrid = document.querySelector(`.activity-grid`);
  const $filter = document.querySelector(`.filter`);
  const $removeFilter = document.querySelector(`.remove-filter-button`);

  const init = () =>   {
    $filter.addEventListener(`submit`, handleSubmitFilter);
    $removeFilter.addEventListener(`click`, handleClickRemoveFilter);
  };

  const handleClickRemoveFilter = e => {
    $filter.reset();
    handleSubmitFilter(e);
  };

  const handleSubmitFilter = e => {
    e.preventDefault();
    fetch($filter.getAttribute(`action`), {
      headers: new Headers({
        Accept: `application/json`,
      }),
      method: `post`,
      body: new FormData($filter),
    })
      .then(r => r.json())
      .then(data => parse(data));
  };

  const parse = results => {
    console.log(results);
    const $filterArticle = document.createElement(`article`);
    $filterArticle.classList.add(`filter-container`, `program-grid-item`);

    $filterArticle.innerHTML = `<h3 class="hide">Filter</h3>`;
    $filterArticle.appendChild($filter);

    $activityGrid.innerHTML = ``;
    $activityGrid.appendChild($filterArticle);

    results.forEach(event => $activityGrid.appendChild(createEventItem(event)));
  };

  const createEventItem = event => {
    const $link = document.createElement(`a`);
    $link.classList.add(`grid-item-link`);
    $link.setAttribute(`href`, `index.php?page=event-detail&${event.id}`);

    const startDate = new Date(event.start);
    const endDate = new Date(event.end);
    let date = ``;

    if((startDate.getDate() / startDate.getMonth() + 1) !== (endDate.getDate() / endDate.getMonth() + 1)){
      date = `${startDate.getDate()}/${startDate.getMonth() + 1} - ${endDate.getDate()}/${endDate.getMonth() + 1}`;
    }else{
      date = `${startDate.getDate()}/${startDate.getMonth() + 1}`;
    }

    $link.innerHTML = `<article class="program-grid-item">
                        <picture>
                          <img class="grid-image" src="assets/img/ANT1-grid-290w.jpg" alt="${event.title}">
                        </picture>
                        <ul class="tags">
                          <li class="tag">${event.tags[1].tag}</li>
                          <li class="tag">${event.tags[2].tag}</li>
                          <li class="tag">${event.tags[3].tag}</li>
                        </ul>
                        <div class="activity-info">
                          <header><h3 class="title">${event.title}</h3></header>
                          <p class="time">${date}</p>
                          <p class="place">${event.city}</p>
                        </div>
                      </article>`;
    return $link;
  };

  init();

}
