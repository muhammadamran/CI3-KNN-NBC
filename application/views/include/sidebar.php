<!--**********************************Sidebar start***********************************-->
<div class="nk-sidebar">
  <div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
      <li class="nav-label">NAVIGATION</li>
      <li class="<?= $this->uri->segment(1) == "Dashboard" || $this->uri->segment(1) == "dashboard" ? "active" : ""; ?>">
        <a href="<?= base_url('Dashboard'); ?>" aria-expanded="false">
          <i class="fa-solid fa-chart-pie"></i><span class="nav-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-label">K-Nearest Neighbors</li>
      <li class="<?= $this->uri->segment(1) == "KNN" || $this->uri->segment(1) == "knn" ? "active" : ""; ?>">
        <a href="<?= base_url('KNN'); ?>" aria-expanded="false">
          <i class="fa-solid fa-landmark"></i><span class="nav-text">Main Menu</span>
        </a>
      </li>
      <li class="nav-label">Naive Bayes Classifier</li>
      <li class="<?= $this->uri->segment(1) == "NBC" || $this->uri->segment(1) == "nbc" ? "active" : ""; ?>">
        <a href="<?= base_url('NBC'); ?>" aria-expanded="false">
          <i class="fa-solid fa-landmark"></i><span class="nav-text">Main Menu</span>
        </a>
      </li>
      <li class="nav-label">Apps</li>
      <li class="<?= $this->uri->segment(1) == "setting" ? "active" : ""; ?>">
        <a href="<?= base_url('setting'); ?>" aria-expanded="false">
          <i class="fa-solid fa-gear"></i><span class="nav-text">Setting</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<!--**********************************Sidebar end***********************************-->