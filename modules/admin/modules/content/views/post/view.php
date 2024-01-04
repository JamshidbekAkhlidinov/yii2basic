<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:40:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\StatusEnum;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\Post $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(Yii::t('app', 'Update'),
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a(
                Yii::t('app', 'Delete'),
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]
            ) ?>
        </p>
    </div>
    <!--    <div class="card-header">-->
    <!--        --><?php //= DetailView::widget([
    //            'model' => $model,
    //            'attributes' => [
    //                'id',
    //                'title',
    //                [
    //                    'format' => 'raw',
    //                    'attribute' => 'image',
    //                    'value' => static function ($model) {
    //                        return Html::img($model->image, ['width' => '100px']);
    //                    },
    //                ],
    //                'sub_text',
    //                [
    //                    'format' => 'raw',
    //                    'attribute' => 'description',
    //                    'value' => function ($data) {
    //                        return str_replace("<img src=","<img width='600px' height='' src=",$data->description);
    //                    },
    //                ],
    //                [
    //                    'attribute' => 'status',
    //                    'format' => 'raw',
    //                    'value' => static function ($model) {
    //                        return Html::tag(
    //                            'span',
    //                            StatusEnum::ALL[$model->status] ?? "",
    //                            [
    //                                'class' => 'badge ' . StatusEnum::COLORS[$model->status] ?? ""
    //                            ]
    //                        );
    //                    }
    //                ],
    //                'view_count',
    //                'created_at',
    //                'updated_at',
    //                [
    //                    'format' => 'raw',
    //                    'attribute' => 'created_by',
    //                    'value' => static function ($model) {
    //                        if ($user = $model->createdBy) {
    //                            return $user->publicIdentity;
    //                        }
    //                    },
    //                ],
    //                [
    //                    'format' => 'raw',
    //                    'attribute' => 'updated_by',
    //                    'value' => static function ($model) {
    //                        if ($user = $model->updatedBy) {
    //                            return $user->publicIdentity;
    //                        }
    //                    },
    //                ],
    //            ],
    //        ]) ?>
    <!--    </div>-->
</div>

<section>
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-warning-subtle">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="/images/brands/slack.png" alt=""
                                                             class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">User</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-building-line align-bottom me-1"></i>
                                                            Themesbrand
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>Create Date : <span
                                                                    class="fw-medium"><?= $model->created_at ?></span>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div class="badge rounded-pill bg-info fs-12">New</div>
                                                        <div class="badge fs-12"><?= Html::tag(
                                                                'span',
                                                                StatusEnum::ALL[$model->status] ?? "",
                                                                [
                                                                    'class' => 'badge fs-12 ' . StatusEnum::COLORS[$model->status] ?? ""
                                                                ]
                                                            ); ?></div>
                                                    </div>
                                                </div>
                                                <div class="hstack gap-1 flex-wrap">
                                                    <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                                        <i class="ri-star-fill"></i>
                                                    </button>
                                                    <button type="button" class="btn py-0 fs-16 text-body">
                                                        <i class="ri-share-line"></i>
                                                    </button>
                                                    <button type="button" class="btn py-0 fs-16 text-body">
                                                        <i class="ri-flag-line"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <img src="<?= $model->image ?>" alt="..." style="width: 250px;">
                                        </div>
                                    </div>
                                    <!--                                        <div class="col-md-auto">-->
                                    <!--                                            <div class="hstack gap-1 flex-wrap">-->
                                    <!--                                                <button type="button" class="btn py-0 fs-16 favourite-btn active">-->
                                    <!--                                                    <i class="ri-star-fill"></i>-->
                                    <!--                                                </button>-->
                                    <!--                                                <button type="button" class="btn py-0 fs-16 text-body">-->
                                    <!--                                                    <i class="ri-share-line"></i>-->
                                    <!--                                                </button>-->
                                    <!--                                                <button type="button" class="btn py-0 fs-16 text-body">-->
                                    <!--                                                    <i class="ri-flag-line"></i>-->
                                    <!--                                                </button>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 fw-semibold text-uppercase"><?= $model->title ?></h6>
                                                <div class="">
                                                    <p><?= str_replace("<img src=", "<img width='100%' height='' src=", $model->description); ?></p>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-link link-success p-0">Read
                                                        more
                                                    </button>
                                                </div>

                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <div class="row">

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Create Date
                                                                    :</p>
                                                                <h5 class="fs-15 mb-0"><?= $model->created_at ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Due Date :</p>
                                                                <h5 class="fs-15 mb-0"><?= $model->updated_at ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Status :</p>
                                                                <div><?= Html::tag(
                                                                        'span',
                                                                        StatusEnum::ALL[$model->status] ?? "",
                                                                        [
                                                                            'class' => 'badge  fs-12 ' . StatusEnum::COLORS[$model->status] ?? ""
                                                                        ]
                                                                    ); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Comments</h4>
                                            <div class="flex-shrink-0">
                                                <div class="dropdown card-header-dropdown">
                                                    <a class="text-reset dropdown-btn" href="#"
                                                       data-bs-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <span class="text-muted">Recent<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Recent</a>
                                                        <a class="dropdown-item" href="#">Top Rated</a>
                                                        <a class="dropdown-item" href="#">Previous</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-body">

                                            <div data-simplebar style="height: 300px;" class="px-3 mx-n3 mb-2">
                                                <div class="d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="/images/users/avatar-8.jpg" alt=""
                                                             class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-13">Joseph Parker <small class="text-muted ms-2">20
                                                                Dec 2021 - 05:47AM</small></h5>
                                                        <p class="text-muted">I am getting message from customers that
                                                            when they place order always get error message .</p>
                                                        <a href="javascript: void(0);"
                                                           class="badge text-muted bg-light"><i
                                                                    class="mdi mdi-reply"></i> Reply</a>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="/images/users/avatar-10.jpg" alt=""
                                                                     class="avatar-xs rounded-circle"/>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-13">Alexis Clarke <small
                                                                            class="text-muted ms-2">22 Dec 2021 -
                                                                        02:32PM</small></h5>
                                                                <p class="text-muted">Please be sure to check your Spam
                                                                    mailbox to see if your email filters have identified
                                                                    the email from Dell as spam.</p>
                                                                <a href="javascript: void(0);"
                                                                   class="badge text-muted bg-light"><i
                                                                            class="mdi mdi-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="/images/users/avatar-6.jpg" alt=""
                                                             class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-13">Donald Palmer <small class="text-muted ms-2">24
                                                                Dec 2021 - 05:20PM</small></h5>
                                                        <p class="text-muted">If you have further questions, please
                                                            contact Customer Support from the “Action Menu” on your <a
                                                                    href="javascript:void(0);"
                                                                    class="text-decoration-underline">Online Order
                                                                Support</a>.</p>
                                                        <a href="javascript: void(0);"
                                                           class="badge text-muted bg-light"><i
                                                                    class="mdi mdi-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="/images/users/avatar-10.jpg" alt=""
                                                             class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-13">Alexis Clarke <small class="text-muted ms-2">26
                                                                min ago</small></h5>
                                                        <p class="text-muted">Your <a href="javascript:void(0)"
                                                                                      class="text-decoration-underline">Online
                                                                Order Support</a> provides you with the most current
                                                            status of your order. To help manage your order refer to the
                                                            “Action Menu” to initiate return, contact Customer Support
                                                            and more.</p>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col-lg-1 col-sm-2 col-6">
                                                                <img src="/images/small/img-4.jpg" alt=""
                                                                     class="img-fluid rounded">
                                                            </div>
                                                            <div class="col-lg-1 col-sm-2 col-6">
                                                                <img src="/images/small/img-5.jpg" alt=""
                                                                     class="img-fluid rounded">
                                                            </div>
                                                        </div>
                                                        <a href="javascript: void(0);"
                                                           class="badge text-muted bg-light"><i
                                                                    class="mdi mdi-reply"></i> Reply</a>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="/images/users/avatar-6.jpg" alt=""
                                                                     class="avatar-xs rounded-circle"/>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-13">Donald Palmer <small
                                                                            class="text-muted ms-2">8 sec ago</small>
                                                                </h5>
                                                                <p class="text-muted">Other shipping methods are
                                                                    available at checkout if you want your purchase
                                                                    delivered faster.</p>
                                                                <a href="javascript: void(0);"
                                                                   class="badge text-muted bg-light"><i
                                                                            class="mdi mdi-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="mt-4">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="exampleFormControlTextarea1"
                                                               class="form-label text-body">Leave a Comments</label>
                                                        <textarea class="form-control bg-light border-light"
                                                                  id="exampleFormControlTextarea1" rows="3"
                                                                  placeholder="Enter your comment..."></textarea>
                                                    </div>
                                                    <div class="col-12 text-end">
                                                        <button type="button"
                                                                class="btn btn-ghost-secondary btn-icon waves-effect me-1">
                                                            <i class="ri-attachment-line fs-16"></i></button>
                                                        <a href="javascript:void(0);" class="btn btn-success">Post
                                                            Comments</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- ene col -->
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Categories</h5>
                                            <ul style="display: flex;flex-wrap: wrap" class="fs-16">
                                                <?php $items = [] ?>
                                                <?php foreach ($model->postCategoryLinkers as $linker) { ?>
                                                    <li class="badge fw-medium bg-secondary-subtle text-secondary m-1"><?= $items[] = $linker->postCategory->name ?></li>
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">Figma</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">HTML</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">CSS</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">Javascript</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">C#</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">Nodejs</li>-->
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Tags</h5>
                                            <ul style="display: flex;flex-wrap: wrap" class="fs-16">
                                                <?php $items = [] ?>
                                                <?php foreach ($model->postTagLinkers as $linker) { ?>
                                                    <li class="badge fw-medium bg-secondary-subtle text-secondary m-1"><?= $items[] = $linker->tag->name ?></li>
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">Figma</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">HTML</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">CSS</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">Javascript</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">C#</li>-->
                                                    <!--                                                        <li class="badge fw-medium bg-secondary-subtle text-secondary">Nodejs</li>-->
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <!-- end card body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Resources</h6>
                                                <div class="row g-3">
                                                    <div class="col-4 col-lg-6">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-folder-zip-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#"
                                                                                              class="text-body text-truncate d-block">App
                                                                            pages.zip</a></h5>
                                                                    <div>2.2MB</div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="d-flex gap-1">
                                                                        <button type="button"
                                                                                class="btn btn-icon text-muted btn-sm fs-18">
                                                                            <i class="ri-download-2-line"></i>
                                                                        </button>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown"
                                                                                    type="button"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                <i class="ri-more-fill"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                       href="#"><i
                                                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Rename</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                       href="#"><i
                                                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-4 col-lg-6">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-file-ppt-2-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#"
                                                                                              class="text-body text-truncate d-block">Velzon
                                                                            admin.ppt</a></h5>
                                                                    <div>2.4MB</div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="d-flex gap-1">
                                                                        <button type="button"
                                                                                class="btn btn-icon text-muted btn-sm fs-18">
                                                                            <i class="ri-download-2-line"></i>
                                                                        </button>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown"
                                                                                    type="button"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                <i class="ri-more-fill"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                       href="#"><i
                                                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Rename</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                       href="#"><i
                                                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end tab pane -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script>
                    © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end main content-->
</section>
