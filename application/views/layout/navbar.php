<ul class="nav nav-pills justify-content-center nav-tabs py-3 bg-secondary fixed-top mb-5">
    <li class="nav-item">
        <a class="nav-link text-light font-weight-bold <?php echo ($title_page == 'Home') ? 'active':''?>" href="<?= base_url('')?>">
        <i class="fa fa-home mr-1" aria-hidden="true"></i>Home
    </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light font-weight-bold <?php echo ($title_page == 'Data') ? 'active':''?>" href="<?= base_url('data')?>">
        <i class="fa fa-file-text-o mr-1" aria-hidden="true"></i>Data
    </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('setting')?>" class="nav-link text-light font-weight-bold <?php echo ($title_page == 'Setting') ? 'active':''?>">
        <i class="fa fa-wrench mr-1" aria-hidden="true"></i>Setting
    </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('user')?>" class="nav-link text-light font-weight-bold <?php echo ($title_page == 'User') ? 'active':''?>">
        <i class="fa fa-user mr-1" aria-hidden="true"></i>User
    </a>
    </li>
</ul>