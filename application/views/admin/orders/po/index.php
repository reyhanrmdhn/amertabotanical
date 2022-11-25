<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1"><?= $title; ?></h4>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="header-title">Pre-Order List</h4>
                                    </div>
                                    <div class="col-lg-6" style="text-align:right">
                                        <button class="mb-3 btn btn-primary btn-sm" data-toggle="modal" data-target="#addPOModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Pre-Order</button>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-bordered table-responsive" style="border-collapse: collapse; border-spacing: 0;overflow-x:auto">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Order ID</th>
                                            <th width="10%">Order Date</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th width="10%" style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x = 1; ?>
                                        <?php foreach ($preorder as $po) { ?>
                                            <th><?= $x++; ?></th>
                                            <th>#<?= $po['id_po']; ?></th>
                                            <th><?= date('d-M-Y', strtotime($po['tanggal_po'])); ?></th>
                                            <th><?= $po['nama_customer']; ?></th>
                                            <th>Rp. <?= number_format($po['total']); ?></th>
                                            <th class="text-center">
                                                <button class="btn btn-info btn-sm btnInfoPO" data-id="<?= $po['id_po'] ?>"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-warning btn-sm btnEditPO" data-id="<?= $po['id_po'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePOModal<?= $po['id_po'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            </th>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->

    <div class="modal fade" id="addPOModal" tabindex="-1" role="dialog" aria-labelledby="addPOModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPOModalLabel">Add New Pre-Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/addPO') ?>" method="POST">
                    <div class="modal-body mx-3">

                        <div class="form-group">
                            <label for="nama_customer">Name</label>
                            <input type="text" name="nama_customer" class="form-control" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_po">Date</label>
                            <input type="date" name="tanggal_po" id="tanggal_po" class="form-control" required>
                            <script>
                                var date = new Date();
                                var day = date.getDate();
                                var month = date.getMonth() + 1;
                                var year = date.getFullYear();

                                if (month < 10) month = "0" + month;
                                if (day < 10) day = "0" + day;

                                var today = year + "-" + month + "-" + day;
                                document.getElementById("tanggal_po").value = today;
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_po">Jumlah PO</label>
                            <input type="text" name="jumlah_po" class="form-control" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="modal_po">Modal PO</label>
                            <input type="text" name="modal_po" class="form-control number" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="uang_kembali">Jumlah Uang Kembali</label>
                            <input type="text" name="uang_kembali" class="form-control number" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="total_po">Total</label>
                            <input type="text" name="total_po" class="form-control number" placeholder="Type Something.." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Data</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoPOModal" tabindex="-1" role="dialog" aria-labelledby="infoPOModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoPOModalLabel">Pre-Order Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_customer">Name</label>
                        <h5 class="nama_customer"></h5>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_po">Date</label>
                        <h5 class="tanggal_po"></h5>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_po">Jumlah PO</label>
                        <h5 class="jumlah_po"></h5>
                    </div>
                    <div class="form-group">
                        <label for="modal_po">Modal PO</label>
                        <h5 class="modal_po"></h5>
                    </div>
                    <div class="form-group">
                        <label for="uang_kembali">Jumlah Uang Kembali</label>
                        <h5 class="uang_kembali"></h5>
                    </div>
                    <div class="form-group">
                        <label for="total_po">Total</label>
                        <h5 class="total_po"></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

   <div class="modal fade" id="editPOModal" tabindex="-1" role="dialog" aria-labelledby="editPOModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPOModalLabel">Edit Pre-Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editPO') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_customer">Name</label>
                            <input style="color:#739d31" type="text" name="nama_customer" class="form-control nama_customer" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_po">Date</label>
                            <input style="color:#739d31" type="date" name="tanggal_po" class="form-control tanggal_po" required>

                        </div>
                        <div class="form-group">
                            <label for="jumlah_po">Jumlah PO</label>
                            <input style="color:#739d31" type="text" name="jumlah_po" class="form-control jumlah_po" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="modal_po">Modal PO</label>
                            <input style="color:#739d31" type="text" name="modal_po" class="form-control number modal_po" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="uang_kembali">Jumlah Uang Kembali</label>
                            <input style="color:#739d31" type="text" name="uang_kembali" class="form-control number uang_kembali" placeholder="Type Something.." required>
                        </div>
                        <div class="form-group">
                            <label for="total_po">Total</label>
                            <input style="color:#739d31" type="text" name="total_po" class="form-control number total_po" placeholder="Type Something.." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_po" class="id_po">
                        <button type="submit" class="btn btn-primary">Add Data</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($preorder as $po) { ?>
        <div class="modal fade" id="deletePOModal<?= $po['id_po'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Data Pre-Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are You Sure Want to Delete This Data?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="location.href='<?= base_url('admin/deletePO/' . $po['id_po']) ?>'"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>