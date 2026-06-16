<div class="body-d side-body">
    <div class="pur-head">
        <a class="side-title" href="#pur1" data-toggle="tab">Project combo</a>
        <a class="side-title" href="#pur2" data-toggle="tab">Project combo</a>
        <div class="clearfix"></div>
    </div>

    <div class="tab-content">
        <div id="pur1" class="tab-pane fade pdetail-mota1 active in">
            <div class="row">
                <?php $data = $this->App->get_data('combo', array());  
                pr($data)   ?>
                <?php //foreach ($this->data as $v) {      
                ?>
                <?php foreach ($data as $v) {      ?>
                    <div class="col-lg-3 col-md-4 col-xs-12">
                        <div class="combo-item">
                            <div class="wrap-img img-100">
                                <?php if ($v['Combo']['image'] != '') {     ?>
                                    <img src="<?php echo $v['Combo']['image']; ?>" alt="">
                                <?php     }      ?>
                            </div>
                            <div class="text-box">
                                <h2 class="title"><?php echo $v['Combo']['title']; ?></h2>
                                <p class="des"><?php echo $v['Combo']['content']; ?></p>
                                <p class="price-total"><?php echo number_format($v['Combo']['price']); ?> $</p>
                                <a class="link" onclick="loadcombo('#combo-<?php echo $v['Combo']['id']; ?>')" data-toggle="modal" data-target="#comboModal"
                                    href="javascript:;">BUY NOW</a>
                                <textarea hidden name="" id='combo-<?php echo $v['Combo']['id']; ?>'><?php echo json_encode($v); ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php     }      ?>
            </div>
        </div>
        <div id="pur2" class="tab-pane fade pdetail-mota2">
            <div class="dashboard space-list">
                <div class="row">
                    <?php     /* 
                <div class="col-sm-3">
                    <?php echo $this->element('sidebar-user'); ?>
                </div>
                */      ?>
                    <div class="col-sm-12">
                        <div class="tab-info">
                            <div class="info-inner">
                                <h2 class="title">
                                    Total purchase: <?php echo count($data)      ?>
                                </h2>
                                <div class="table-mobile table-responsive">
                                    <table class="type-3">
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="20%">Combo</th>
                                            <th width="10%">Amount</th>
                                            <th width="15%">Payment wallet</th>
                                            <th width="10%">Total</th>
                                            <th width="10%">Status</th>
                                            <th width="15%">Purchase date</th>
                                            <th width="15%">Last modified date</th>
                                        </tr>
                                        <?php if (isset($data) && count($data) > 0) { ?>
                                            <?php $i = 0; ?>
                                            <?php foreach ($data as $v) { ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <td class="stt"><?php echo $i; ?></td>
                                                    <td class="name"><?php echo $v['Combo']['title'] ?></td>
                                                    <td><?php echo $v['OrderBill']['quantity'] ?></td>
                                                    <td><?php echo $v['OrderBill']['wallet_validation'] ?></td>
                                                    <td><?php echo number_format($v['OrderBill']['cart_sum']) . '$' ?></td>
                                                    <td>
                                                        <?php
                                                        if ($v['OrderBill']['status'] == 0) echo 'Waiting for activation';
                                                        if ($v['OrderBill']['status'] == 1) echo 'active';
                                                        if ($v['OrderBill']['status'] == 2) echo 'Off';
                                                        ?>
                                                    </td>
                                                    <td><?php echo date('d-m-Y', $v['OrderBill']['created']); ?></td>
                                                    <td><?php echo is_numeric($v['OrderBill']['modified']) ? date('d-m-Y', $v['OrderBill']['modified']) : '-'; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td class="stt">-</td>
                                                <td class="name">-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- modal content -->
<div class="combo-modal modal fade" id="comboModal" role="dialog">
    <div class="modal-dialog">
        <div class="combo-item">
            <div class="wrap-img img-100">
                <img class="img" src="https://firebasestorage.googleapis.com/v0/b/dragonnodedev.firebasestorage.app/o/1735019135376DragonNODE(297x210mm).png?alt=media&token=bc03f3d0-b6d1-4a09-9dc3-02e2c9d9b109"
                    alt="combo">
            </div>
            <div class="text-box">
                <input type="hidden" class="combo_id" value="0">
                <h2 class="title">Combo Node 1</h2>
                <p class="des">Combo 10 project Node</p>
                <div class="combo-calc">
                    <a class="minus" onclick="combo_change_quantity(false)" href="javascript:;">
                        -
                    </a>
                    <input type="text" class="quantity" onchange="combo_change_price()" data-price="0" name="" value="1">
                    <a class="plus" onclick="combo_change_quantity(true)" href="javascript:;">
                        +
                    </a>
                    <div class="clearfix"></div>
                </div>
                <p class="price-total">Total: <span>1500</span> $</p>
                <a class="link link_click" data-toggle="modal" data-target="#combo-qr" onclick="combo_step_2()" href="javascript:;">Next</a>
            </div>
        </div>
    </div>
</div>
<!-- modal content end -->

<!-- modal content -->
<div class="combo-modal modal fade" id="combo-qr" role="dialog">
    <div class="modal-dialog">
        <div class="combo-qr">
            <div class="text-box">
                <h2 class="title">Scan QR code for payment wallet address:</h2>
                <div class="qr-img">
                    <img src="https://firebasestorage.googleapis.com/v0/b/dragonnodedev.firebasestorage.app/o/1735019135376DragonNODE(297x210mm).png?alt=media&token=bc03f3d0-b6d1-4a09-9dc3-02e2c9d9b109"
                        alt="combo">
                </div>
                <p class="price-total">Total: <span>1500</span> $</p>
                <p class="copy-code">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M208 0H332.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128h80v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z"></path>
                    </svg>
                    <span>
                        <?php echo 'DragonNode-' . time();      ?>
                    </span>
                </p>
                <a class="link link_click2" href="javascript:;" data-toggle="modal" data-target="#wallet-address">Next</a>
            </div>
        </div>
    </div>
</div>
<!-- modal content end -->

<!-- modal content -->
<div class="combo-modal modal fade" id="wallet-address" role="dialog">
    <div class="modal-dialog">
        <div class="combo-qr">
            <div class="text-box">
                <h2 class="title">Enter your wallet address here for validation:</h2>
                <input type="text" class="wallet_validation">
                <a class="link" href="javascript:;" onclick="wallet_validation()">Complete</a>
            </div>
        </div>
    </div>
</div>
<!-- modal content end -->