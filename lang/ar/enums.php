<?php


return [
    'user_type' => [
        \App\Enums\UserType::Admin->value    => 'آدمن',
        \App\Enums\UserType::Employee->value => 'موظف',
        \App\Enums\UserType::Citizen->value => 'مواطن',
    ],

    'gender' => [
        \App\Enums\Gender::Female->value    => 'انثى',
        \App\Enums\Gender::Male->value => 'ذكر',
    ],

    'rating' => [
        \App\Enums\Rating::Bad->value    => 'سيء',
        \App\Enums\Rating::Good->value => 'جيد',
        \App\Enums\Rating::Excellent->value => 'ممتاز',
    ],

    'report_status' => [
        \App\Enums\ReportStatus::Open->value    => 'مفتوح',
        \App\Enums\ReportStatus::In_progress->value => 'جار العمل عليه',
        \App\Enums\ReportStatus::Completed->value => 'انتهى',
        \App\Enums\ReportStatus::False_report->value => 'بلاغ كاذب',
    ],

    'request_status' => [
        \App\Enums\RequestStatus::Pending->value    => 'قيد الانتظار',
        \App\Enums\RequestStatus::Approved->value => 'موافقة',
        \App\Enums\RequestStatus::Rejected->value => 'مرفوض',
    ],

    'request_type' => [
        \App\Enums\RequestType::License->value    => 'رخصة',
        \App\Enums\RequestType::Permit->value => 'تصريح',
    ],

];
