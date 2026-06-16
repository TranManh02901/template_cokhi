<!-- cart  -->
<?php	 
$tong = 0;
?>
<div class="cart-index cart_index">
    <div class="wrap">
        <div class="container-fluid">
            <h2 class="cart-title">Giỏ hàng</h2>
            <div class="row">
                <div class="col-sm-7">
                    <div class="left">
                        <?php if ($cart_num <= 0) { ?>
                            <div class="cart-empty-text">
                                <?php echo $this->App->t_a('cart_empty'); ?>
                            </div>
                        <?php } else { ?>
                            <?php 
                            foreach ($data as $k => $v) { ?>
                                <div class="cart-item tr_id" rel="<?php echo $v['id']; ?>" data-price="<?php echo $v['price']; ?>">
                                    <div class="row">
                                        <div class="col-sm-8 col-xs-8">
                                            <div class="info-box">
                                                <div class="thumb">
                                                    <div class="wrap-img img-100">
                                                        <?php echo $this->App->img($v['image'], array('alt' => 'product')) ?>
                                                    </div>
                                                </div>
                                                <div class="text-box">
                                                    <p class="title"><?php echo $v['title']; ?></p>
                                                    <a class="delete-cart" href="<?php echo DOMAIN; ?>cart/delete/<?php echo $v['id']; ?>"><span class="fa fa-trash"></span>Xóa</a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-4">
                                            <div class="price-box">
                                                <p class="gia-goc">¥<?php echo number_format($v['price']);     ?></p>
                                                <div class="quantity-box quantity">
                                                    <a href="javascript:;" class="quantity-button quantity-down-box quantity_down" data-product-id="<?php echo $v['id']; ?>">-</a>
                                                    <input ttr_idype="number" name="quantity" class="quantity input-qty tr_id_<?php echo $v['id'] ?> qty quantity-number" id="sl_add_cart" data-product-id="<?php echo $v['id']; ?>" value="<?php echo $v['quantity']; ?>" step="1" min="1" max="999">
                                                    <a href="javascript:;" class="quantity-button quantity-up-box quantity_up" data-product-id="<?php echo $v['id']; ?>">+</a>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <div class="gia-tien">
                                                    <p>¥</p>
                                                    <p class="total-price total_price_tr_id_<?php echo $v['id']; ?> itemCart-price">
                                                        <?php
                                                        $num = $v['price'] * $v['quantity'];
                                                        $tong = $tong + $num;
                                                        echo number_format($num);
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php     }      ?>
                        <?php     }      ?>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="right">
                        <div class="total-box">
                            <div class="box">
                                <p>Tiền hàng</p>
                                <span class="price-tong-cong gia-tien">¥<span id="total-cart-price"><?php echo number_format($tong); ?></span></span>
                                <div class="clearfix"></div>
                            </div>
                            <!-- <div class="box">
                                <p>Giảm giá</p>
                                <div class="clearfix"></div>
                            </div> -->
                            <div class="box">
                                <p>Vận chuyển</p>
                                <span class="van-chuyen">Bước tiếp theo</span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="gachchan"></div>
                            <div class="box">
                                <p>Tạm tính</p>
                                <span class="price-tong-cong-all gia-tien">¥<span id="total-all-price"><?php echo number_format($tong); ?></span></span>
                                <input type="hidden" name="cart_sum" class="cart-sum" value="<?php echo $tong ?>">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="send-box">
                            <form id="top_cart_send" action="">
                                <div class="form-group">
                                    <select name="ship_top" class="ship_top" id="ship-time">
                                        <option value="Không yêu cầu">Chọn thời gian nhận hàng</option>
                                        <option value="Trong buổi sáng">Trong buổi sáng</option>
                                        <option value="12h~14h" selected="">12h~14h</option>
                                        <option value="14h~16h">14h~16h</option>
                                        <option value="16h~18h">16h~18h</option>
                                        <option value="18h~20h">18h~20h</option>
                                        <option value="19h~21h">19h~21h</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="staff_top" type="text" name="staff_top" placeholder="Tên nhân viên hỗ trợ">
                                </div>
                                <div class="form-group">
                                    <textarea class="note_top" name="note_top" id="" placeholder="Ghi chú cho cửa hàng"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="send_payment">Mua hàng</button>
                                </div>
                            </form>
                        </div>
                        <div class="baomat">
                            <p>
                                <svg focusable="false" class="icon icon--lock-2" viewBox="0 0 12 15" role="presentation">
                                    <g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                        <path d="M6 1C4.32 1 3 2.375 3 4.125V6h6V4.125C9 2.375 7.68 1 6 1zM1 6h10v8H1z"></path>
                                    </g>
                                </svg>
                                Thanh toán bảo mật
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                    <!-- home-pbox -->
                    <?php $featured_prd = $this->App->get_data('product', array('featured' => '1'), 20);      ?>
                    <?php if (isset($featured_prd) && is_array($featured_prd) && $featured_prd != '') { ?>
                        <div class="home-pbox">
                            <div class="pbox-head">
                                <div class="pbox-title">
                                    <h2 class="title"><?php echo $this->App->t_a('home_tab_2') ?></h2>
                                    <div class="link-box">
                                        <a class="link" href="<?php echo $this->App->t('home_text_1_link') ?>"><?php echo $this->App->t_a('home_text_1', 'text_link') ?></a>
                                        <svg width='14' height='14'>
                                            <use href='#xem-them'></use>
                                        </svg>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="pbox-body">
                                <div class="owl-carousel owl-theme pbox_slide">
                                    <?php foreach ($featured_prd as $item) {      ?>
                                        <div class="item">
                                            <div class="product-item">
                                                <?php echo $this->App->adm_link('product', $item['Node']['id']); ?>
                                                <div class="thumb">
                                                    <a href="<?php echo $this->App->get_node_link($item) ?>">
                                                        <div class="wrap-img img-100">
                                                            <?php echo $this->App->img($item['Product']['image'], ['alt' => 'product']); ?>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="text-box">
                                                    <a class="title" href="<?php echo $this->App->get_node_link($item) ?>"><?php echo $this->App->t('title', $item['Node']) ?></a>
                                                    <p class="price">Từ ¥<?php echo number_format($item['Product']['price']) ?></p>
                                                </div>
                                                <div class="buy-box">
                                                    <form action="<?php echo DOMAIN; ?>cart/add" method="get" id="gotocart">
                                                        <div class="add-cart">
                                                            <button type="submit" name="submit" class="buy-btn product-add-cart product_add_cart btn-chung" data-id="<?php echo $item['Node']['id'] ?>">
                                                                <?php echo $this->App->t('general_text_2') ?>
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <a class="add-wishlist" href="javascript:;">
                                                        <svg width='24' height='24'>
                                                            <use href='#wishlist-heart'></use>
                                                        </svg>
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    <?php echo $this->App->adm_link('lang', 'general_text_2', 'text'); ?>
                                                </div>
                                                <div class="extra">
                                                    <p><?php echo $this->App->t_a('general_text_1') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php     }      ?>
                                </div>
                            </div>
                        </div>
                    <?php     }      ?>
                    <!-- home-pbox end -->
                </div>
            </div>
        </div>
    </div>
</div>

