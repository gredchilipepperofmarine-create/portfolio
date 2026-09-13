const creates = document.getElementById('creates');

fetch('common/creates/main_creates_output.php')
.then(response => {
  if(!response.ok) {
    throw new Error (`レスポンスエラー:${response.status}`)
  }
  return response.json();
})
.then(data => {
  console.log(data);
  creates.innerHTML= data.map(create => `
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card-hover-wrapper h-100">
        <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal">
          <img src="images/${data.repo_name}.png" class="card-img-top img-fluid rounded-top-3" alt="RPG Demo Pic">
          <div class="card-body p-3 p-md-4 w-100">
            <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3">${data.category}</span>
            <h5 class="card-title fw-bold text-dark mb-3">${data.title}</h5>
            <p>使用言語</p>
            <div id="langDetail" class="barCharaArea"></div>
          </div>
        </button>
      </div>
    </div>
    `).join('');
});