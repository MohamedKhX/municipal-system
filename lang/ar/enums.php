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

    'report_type' => [
        \App\Enums\ReportType::Road->value => 'طريق',
        \App\Enums\ReportType::Accident->value => 'حادث',
        \App\Enums\ReportType::Sanitation->value => 'صحة عامة',
        \App\Enums\ReportType::Electrical->value => 'كهرباء',
        \App\Enums\ReportType::Water->value => 'مياه',
        \App\Enums\ReportType::Sewage->value => 'صرف صحي',
        \App\Enums\ReportType::PublicSafety->value => 'سلامة عامة',
        \App\Enums\ReportType::Environmental->value => 'بيئة',
        \App\Enums\ReportType::Infrastructure->value => 'بنية تحتية',
        \App\Enums\ReportType::TrafficSignal->value => 'إشارة مرور',
        \App\Enums\ReportType::StreetLighting->value => 'إنارة الشوارع',
        \App\Enums\ReportType::PublicFacility->value => 'مرافق عامة',
        \App\Enums\ReportType::Noise->value => 'ضوضاء',
        \App\Enums\ReportType::IllegalDumping->value => 'إلقاء نفايات بشكل غير قانوني',
        \App\Enums\ReportType::Vandalism->value => 'تخريب',
        \App\Enums\ReportType::AnimalControl->value => 'تحكم بالحيوانات',
        \App\Enums\ReportType::Others->value => 'أخرى',
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
