<div class="body-d">
    <div class="body-banner">
        <?php if (isset($banners['slideshow']) && is_array($banners['slideshow']) && $banners['slideshow'] != '') {
            foreach ($banners['slideshow'] as $v) { ?>
                <?php echo $this->App->img($v['Banner']['image'], ['alt' => 'slideshow']); ?>
        <?php     }
        } ?>
    </div>
    <div class="list-head-d">
        <div class="row">
            <div class="col-sm-8">
                <ul class="nav nav-tabs">
                    <li class="<?php echo isset($is_home) && $is_home == 1 ? 'active' : ''; ?>">
                        <a class="link" href="<?php echo DOMAIN; ?>">
                            <svg width='18' height='18'>
                                <use href='#list-icon1'></use>
                            </svg>
                            ALL
                        </a>
                    </li>

                    <?php
                    if (isset($categories) && count($categories) > 0) {
                        foreach ($categories as $v) {
                            $active = '';
                            if (isset($current_category['Node']['id']) && $current_category['Node']['id'] == $v['Node']['id'])
                                $active = 'active';
                    ?>
                            <li class="<?php echo $active; ?>">
                                <a class="link" href="<?php echo $this->App->get_category_link($v); ?>">
                                    <svg width='18' height='18'>
                                        <use href='#list-icon1'></use>
                                    </svg>
                                    <?php echo $v['Node']['title'];      ?>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <li class="<?php echo isset($sold_out) && $sold_out == 1 ? 'active' : ''; ?>">
                        <a class="link" href="<?php echo DOMAIN . 'sold-out.html'; ?>">
                            <svg width='18' height='18'>
                                <use href='#list-icon1'></use>
                            </svg>
                            Sold Out
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 hidden-xs">
                <div class="search-box">
                    <div class="box">
                        <!-- <input class="user-isset" type="text" placeholder="Search a node..."> -->
                        <form class="<?php echo (isset($user) && count($user) > 0) ? 'user-isset' : '' ?>" action="<?php echo DOMAIN . 'search' ?>" method="GET" accept-charset="utf-8">
                            <input type="text" hidden name="type" value="product">
                            <input class="" type="text" placeholder="Search a node..." name="s">
                            <button type="submit" class="search-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0">
                                    <path
                                        d="M15.7138 6.8382C18.1647 9.28913 18.1647 13.2629 15.7138 15.7138C13.2629 18.1647 9.28913 18.1647 6.8382 15.7138C4.38727 13.2629 4.38727 9.28913 6.8382 6.8382C9.28913 4.38727 13.2629 4.38727 15.7138 6.8382"
                                        stroke="#8570A0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path d="M19 19L15.71 15.71" stroke="#8570A0" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </form>
                        <?php if (isset($user) && count($user) > 0) {      ?>
                        <?php     } else { ?>
                            <!-- <button class="user-isset" type="button">Login</button> -->
                            <button data-toggle="modal" data-target="#modallogin" class="login-btn" type="button">Login</button>
                        <?php     }      ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-d">
        <div class="tab-content">
            <div id="qhe1" class="tab-pane fade in active">
                <div class="qhe-dautu-box">
                    <div class="sp-div">
                        <?php if (isset($this->data['product']) && count($this->data['product']) > 0) { ?>
                            <div class="sp-head-drop">
                                <div class="left-t">
                                    <div class="light-dot"></div>
                                    <p class="name-title">
                                        Available slots
                                    </p>
                                </div>
                                <div class="right-t">
                                    <a class="link" href="javascript:;" data-toggle="collapse" data-target="#drop-home1">
                                        <span>2 Nodes</span>
                                        <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 duration-200 rotate-0">
                                            <path d="M17.0306 1.53062L9.53062 9.03062C9.46096 9.10036 9.37825 9.15567 9.2872 9.19342C9.19615 9.23116 9.09855 9.25059 8.99999 9.25059C8.90143 9.25059 8.80383 9.23116 8.71279 9.19342C8.62174 9.15567 8.53902 9.10036 8.46937 9.03062L0.969365 1.53062C0.828634 1.38989 0.749573 1.19902 0.749573 0.999997C0.749573 0.800974 0.828634 0.610103 0.969365 0.469372C1.1101 0.328642 1.30097 0.24958 1.49999 0.24958C1.69901 0.24958 1.88988 0.328642 2.03062 0.469372L8.99999 7.43968L15.9694 0.469372C16.0391 0.399689 16.1218 0.344414 16.2128 0.306702C16.3039 0.26899 16.4014 0.24958 16.5 0.24958C16.5985 0.24958 16.6961 0.26899 16.7872 0.306702C16.8782 0.344414 16.9609 0.399689 17.0306 0.469372C17.1003 0.539055 17.1556 0.62178 17.1933 0.712825C17.231 0.80387 17.2504 0.901451 17.2504 0.999997C17.2504 1.09854 17.231 1.19612 17.1933 1.28717C17.1556 1.37821 17.1003 1.46094 17.0306 1.53062Z" fill="#BAA9D0"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="sp-item-box collapse in" id="drop-home1">
                                <div class="row">
                                    <?php foreach ($this->data['product'] as $v) {
                                        if ($v['Product']['status'] == 1) { ?>
                                            <div class="sp-item">
                                                <div class="light-dot <?php echo $v['Product']['status'] == 1 ? 'active' : '' ?>"></div>
                                                <div class="sp-image">
                                                    <?php echo $this->App->img($v['Product']['image'], ['alt' => 'Product']);      ?>
                                                    <p><?php echo $v['Node']['title']; ?></p>
                                                </div>
                                                <div class="sp-status">
                                                    <div class="left">
                                                        <p class="slot">Slot</p>
                                                    </div>
                                                    <div class="right">
                                                        <p class="number"><?php echo $v['Product']['quantity'] != '' ? $v['Product']['quantity'] : '0'     ?></p>
                                                        <a class="link" onclick="loadinfo('#info-<?php echo $v['Product']['id']; ?>')" href="javascript:;" data-toggle="modal" data-target="#modalinfo">Detail</a>
                                                        <textarea hidden name="" id='info-<?php echo $v['Product']['id']; ?>'><?php echo json_encode($v); ?></textarea>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        <?php     }      ?>
                                    <?php     }      ?>
                                </div>
                            </div>
                        <?php     }      ?>
                    </div>

                    <div class="sp-div">
                        <?php if (isset($this->data['product']) && count($this->data['product']) > 0) { ?>
                            <div class="sp-head-drop">
                                <div class="left-t">
                                    <div class="light-dot"></div>
                                    <p class="name-title">
                                        Available slots
                                    </p>
                                </div>
                                <div class="right-t">
                                    <a class="link collapsed" href="javascript:;" data-toggle="collapse" data-target="#drop-home2">
                                        <span>2 Nodes</span>
                                        <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 duration-200 rotate-0">
                                            <path d="M17.0306 1.53062L9.53062 9.03062C9.46096 9.10036 9.37825 9.15567 9.2872 9.19342C9.19615 9.23116 9.09855 9.25059 8.99999 9.25059C8.90143 9.25059 8.80383 9.23116 8.71279 9.19342C8.62174 9.15567 8.53902 9.10036 8.46937 9.03062L0.969365 1.53062C0.828634 1.38989 0.749573 1.19902 0.749573 0.999997C0.749573 0.800974 0.828634 0.610103 0.969365 0.469372C1.1101 0.328642 1.30097 0.24958 1.49999 0.24958C1.69901 0.24958 1.88988 0.328642 2.03062 0.469372L8.99999 7.43968L15.9694 0.469372C16.0391 0.399689 16.1218 0.344414 16.2128 0.306702C16.3039 0.26899 16.4014 0.24958 16.5 0.24958C16.5985 0.24958 16.6961 0.26899 16.7872 0.306702C16.8782 0.344414 16.9609 0.399689 17.0306 0.469372C17.1003 0.539055 17.1556 0.62178 17.1933 0.712825C17.231 0.80387 17.2504 0.901451 17.2504 0.999997C17.2504 1.09854 17.231 1.19612 17.1933 1.28717C17.1556 1.37821 17.1003 1.46094 17.0306 1.53062Z" fill="#BAA9D0"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="sp-item-box collapse" id="drop-home2">
                                <div class="row">
                                    <?php foreach ($this->data['product'] as $v) {
                                        if ($v['Product']['status'] == 0) { ?>
                                            <div class="sp-item">
                                                <div class="light-dot <?php echo $v['Product']['status'] == 1 ? 'active' : '' ?>"></div>
                                                <div class="sp-image">
                                                    <?php echo $this->App->img($v['Product']['image'], ['alt' => 'Product']);      ?>
                                                    <p><?php echo $v['Node']['title']; ?></p>
                                                </div>
                                                <div class="sp-status">
                                                    <div class="left">
                                                        <p class="slot">Slot</p>
                                                    </div>
                                                    <div class="right">
                                                        <p class="number"><?php echo $v['Product']['quantity'] != '' ? $v['Product']['quantity'] : '0'     ?></p>
                                                        <a class="link" onclick="loadinfo('#info-<?php echo $v['Product']['id']; ?>')" href="javascript:;" data-toggle="modal" data-target="#modalinfo">Detail</a>
                                                        <textarea hidden name="" id='info-<?php echo $v['Product']['id']; ?>'><?php echo json_encode($v); ?></textarea>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        <?php     }      ?>
                                    <?php     }      ?>
                                </div>
                            </div>
                        <?php     }      ?>
                    </div>

                    <?php /* if (isset($this->data['product']) && count($this->data['product']) > 0) {
                            foreach ($this->data['product'] as $v) {     ?>
                                <div class="sp-item">
                                    <div class="light-dot <?php echo $v['Product']['status'] == 1 ? 'active' : '' ?>"></div>
                                    <div class="sp-image">
                                        <?php echo $this->App->img($v['Product']['image'], ['alt' => 'Product']);      ?>
                                        <p><?php echo $v['Node']['title']; ?></p>
                                    </div>
                                    <div class="sp-status">
                                        <div class="left">
                                            <p class="slot">Slot</p>
                                        </div>
                                        <div class="right">
                                            <p class="number"><?php echo $v['Product']['quantity'] != '' ? $v['Product']['quantity'] : '0'     ?></p>
                                            <a class="link" onclick="loadinfo('#info-<?php echo $v['Product']['id']; ?>')" href="javascript:;" data-toggle="modal" data-target="#modalinfo">Detail</a>
                                            <textarea hidden name="" id='info-<?php echo $v['Product']['id']; ?>'><?php echo json_encode($v); ?></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            <?php     }      ?>
                        <?php     }     */ ?>
                </div>
            </div>
        </div>
    </div>
</div>