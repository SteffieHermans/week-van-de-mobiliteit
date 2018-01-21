{
  const $activityGrid = document.querySelector(`.activity-grid`);
  const $filter = document.querySelector(`.filter`);

  const init = () =>   {
    $filter.addEventListener(`submit`, handleSubmitFilter);
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
    $activityGrid.innerHTML = results
      .map(event => createEventItem(event))
      .join(``);
  };

  const createEventItem = event => {

    return `<article>
      <header><h2>${event.title}</h2></header>
      <dl>
        <dt>code</dt><dd>${event.code}</dd>
        <dt>city</dt><dd>${event.city}</dd>
        <dt>start</dt><dd>${event.start}</dd>
        <dt>end</dt><dd>${event.end}</dd>
      </dl>
    </article>`;
  };

  init();

}
