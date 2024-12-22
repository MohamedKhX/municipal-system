<x-app-layout>
    @push('styles')
        <style>

            body {
                font-family: "Roboto", sans-serif;
                background: #EFF1F3;
                min-height: 100vh;
                position: relative;
            }

            .section-50 {
                padding: 50px 0;
            }

            .m-b-50 {
                margin-bottom: 50px;
            }

            .dark-link {
                color: #333;
            }

            .heading-line {
                position: relative;
                padding-bottom: 5px;
            }

            .heading-line:after {
                content: "";
                height: 4px;
                width: 75px;
                background-color: #29B6F6;
                position: absolute;
                bottom: 0;
                left: 0;
            }

            .notification-ui_dd-content {
                margin-bottom: 30px;
            }

            .notification-list {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                padding: 20px;
                margin-bottom: 7px;
                background: #fff;
                -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
            }

            .notification-list--unread {
                border-left: 2px solid #29B6F6;
            }

            .notification-list .notification-list_content {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }

            .notification-list .notification-list_content .notification-list_img img {
                height: 48px;
                width: 48px;
                border-radius: 50px;
                margin-right: 20px;
            }

            .notification-list .notification-list_content .notification-list_detail p {
                margin-bottom: 5px;
                line-height: 1.2;
            }

            .notification-list .notification-list_feature-img img {
                height: 48px;
                width: 48px;
                border-radius: 5px;
                margin-left: 20px;
            }
        </style>
    @endpush
        <section class="section-50">
            <div class="container">
                <h3 class="m-b-50 heading-line">
                    <i class="fa fa-bell text-muted"></i>
                    الإشعارات
                </h3>
                <div class="notification-ui_dd-content">
                    @forelse(auth()->user()->notifications as $notification)
                        @php
                            $request = \App\Models\Request::find($notification->data['request_id']);
                        @endphp

                        <div class="notification-list">
                            <div class="notification-list_content">
                                <div class="notification-list_img" style="margin-left: 20px">
                                    <img src="images/municipal-logo.webp" alt="مستخدم">
                                </div>
                                <div class="notification-list_detail">
                                    <p>
                                        <b>{{ $request->municipality->name }}</b>
                                        @if($request->status== \App\Enums\RequestStatus::Approved)
                                            قد تمت الموافقة على طلبك
                                        @else
                                            قد تم رفض طلبك
                                        @endif
                                    </p>
                                    <p class="text-muted mt-2">
                                        {{ $request->response }}
                                    </p>

                                    @if($request->municipalityAttachments->count())
                                        <div class="mt-3">
                                            <b>المرفقات</b>
                                            <ul>
                                                @foreach($request->municipalityAttachments as $attachment)
                                                    <li>
                                                        <a style="color: blue" href="{{ $attachment->getUrl() }}" download="{{ $attachment->name }}">
                                                            {{ $attachment->name }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endif

                                    <p class="text-muted"><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                                </div>
                            </div>
                            <div class="notification-list_feature-img">
                                <img src="{{ asset('images/municipal-logo.webp') }}" alt="صورة مميزة">
                            </div>
                        </div>

                    @empty
                        <div class="text-center">
                            <p>لا يوجد إشعارات!</p>
                            <div style="height: 10vh"></div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

</x-app-layout>
