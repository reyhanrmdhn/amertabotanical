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
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#users" role="tab">
                                            <i class="fas fa-users mr-1"></i> <span class="d-none d-md-inline-block">Users</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#roles" role="tab">
                                            <i class="fas fa-user-tag mr-1"></i> <span class="d-none d-md-inline-block">Roles</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content mb-4">
                                    <div class="tab-pane active" id="users" role="tabpanel">
                                        <div class="row mt-4">
                                            <div class="col-lg-6">
                                                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addNewUserModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New User</button>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered table-responsive" style="border-collapse: collapse; border-spacing: 0;overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th width="15%" style="text-align: center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1; ?>
                                                <?php foreach ($users as $u) { ?>
                                                    <tr>
                                                        <th><?= $x++; ?></th>
                                                        <th><?= $u['name']; ?></th>
                                                        <th><?= $u['email']; ?></th>
                                                        <th><?= $u['role']; ?></th>
                                                        <th style="text-align: center">
                                                            <button type="button" class="btn btn-info btn-sm btnInfoUser mb-1" data-id="<?= $u['id'] ?>"><i class="fas fa-eye"></i></button>
                                                            <button type="button" class="btn btn-warning btn-sm btnEditUser mb-1" data-id="<?= $u['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                                            <?php if ($u['id'] != $user['id']) { ?>
                                                                <button type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#deleteUserModal<?= $u['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                                            <?php } ?>
                                                        </th>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane" id="roles" role="tabpanel">
                                        <div class="row mt-4">
                                            <div class="col-lg-6">
                                                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addRoleModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Role</button>
                                            </div>
                                        </div>
                                        <table id="datatable2" class="table table-bordered table-responsive" style="border-collapse: collapse; border-spacing: 0;overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($role as $r) { ?>
                                                    <tr>
                                                        <td width="5%"><?= $i++; ?></td>
                                                        <td><?= $r['role']; ?></td>
                                                        <td width="25%">
                                                            <button class="btn btn-info btn-sm btnInfoAccess mb-1" data-role_id="<?= $r['role_id'] ?>"><i class="fas fa-link"></i>&nbsp;&nbsp;Access</button>
                                                            <button class="btn btn-warning btn-sm btnEditRole mb-1" data-role="<?= $r['role'] ?>" data-id="<?= $r['role_id'] ?>"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->

    <div class="modal fade" id="addNewUserModal" tabindex="-1" role="dialog" aria-labelledby="addNewUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewUserModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/addUser') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control emailNewUser" name="email" placeholder="Someone's Email..">
                            <p class="email_valid"></p>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="nama" placeholder="Someone's Name..">
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select name="role_id" class="role form-control">
                                <option value="">Select Role</option>
                                <?php foreach ($role as $r) { ?>
                                    <option value="<?= $r['role_id'] ?>"><?= $r['role']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password1" name="password" placeholder="Type a Password..">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success btnChangeType1" type="button"><i class="iconChange1 fas fa-eye"></i></button>
                                </div>
                            </div>
                            <input type="hidden" value="0" class="changeType1">
                        </div>
                        <div class="form-group">
                            <label for="password2">Repeat</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password2" placeholder="Repeat Password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success btnChangeType2" type="button"><i class="iconChange2 fas fa-eye"></i></button>
                                </div>
                            </div>
                            <p class="message"></p>
                            <input type="hidden" value="0" class="changeType2">
                        </div>
                        <input type="hidden" id="emailValid" value="0">
                        <input type="hidden" id="passValid" value="0">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnRegister" disabled>Add User</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoUserModal" tabindex="-1" role="dialog" aria-labelledby="infoUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoUserModalLabel">Info User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12" style="padding:0 30px">
                            <div class="image text-center">
                                <img src="" alt="" class="rounded-circle userImg" height="120" width="auto">
                            </div>
                            <div class="desc text-center mt-3">
                                <h3 class="userName"></h3>
                                <p class="userEmail"></p>
                            </div>
                            <div class="line" style="border-bottom: 1px solid #DEDEDE;"></div>
                            <div class="desc mt-3 mx-auto">
                                <p style="font-weight: bold; font-size:15px" class="mb-1">Registered</p>
                                <p class="mb-3 userDateRegistered"></p>

                                <p style="font-weight: bold; font-size:15px" class="mb-1">Role</p>
                                <h5 class="mb-3">
                                    <span class="badge badge-soft-info userRole"></span>
                                </h5>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editUser') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control name" name="name" placeholder="Someone's Name..">
                        </div>
                        <div class="form-group">
                            <label for="name">Role</label>
                            <select name="role_id" class="role form-control">
                                <?php foreach ($role as $r) { ?>
                                    <option value="<?= $r['role_id'] ?>"><?= $r['role']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" class="user_id">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($users as $u) { ?>
        <div class="modal fade" id="deleteUserModal<?= $u['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are You Sure Want to Delete This User?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="location.href='<?= base_url('admin/deleteUser/' . $u['id']) ?>'"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- role -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoleModalLabel">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/addRole') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control" placeholder="Type Something..">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editRole') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control role" placeholder="Type Something..">
                            <input type="hidden" name="role_id" class="role_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoAccessModal" tabindex="-1" role="dialog" aria-labelledby="infoAccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoAccessModalLabel">Role Access</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="notif"></div>
                <div class="modal-body menuCheckbox">
                    <?php $menu = $this->m_global->get_menu(); ?>
                    <?php foreach ($menu as $m) { ?>
                        <div class="custom-control custom-checkbox mb-2 ml-2">
                            <input type="checkbox" class="custom-control-input" id="menu<?= $m['menu_id'] ?>">
                            <label class="custom-control-label" for="menu<?= $m['menu_id'] ?>"><?= $m['title']; ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>
                </div>
            </div>
        </div>
    </div>