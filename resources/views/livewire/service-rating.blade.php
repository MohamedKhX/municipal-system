<div>
    <div class="bd-comments details-text-area">
        <h3>التقييمات</h3>
        @foreach($ratings as $rating)

            <div class="comment-card">
                <h5>{{$rating->user->name}}</h5>
                @if($rating->rating == \App\Enums\Rating::Bad)
                    <span class="badge text-bg-danger " style="margin-top: 8px">جودة الخدمة: سيء</span>
                @elseif($rating->rating == \App\Enums\Rating::Good)
                    <span class="badge text-bg-warning " style="margin-top: 8px">جودة الخدمة: جيد</span>
                @elseif($rating->rating == \App\Enums\Rating::Excellent)
                    <span class="badge text-bg-success " style="margin-top: 8px">جودة الخدمة: ممتاز</span>
                @endif
                <p>
                    {{ $rating->review }}
                </p>
            </div>
        @endforeach
    </div>

    @auth
        @if(auth()->user()->hasRating($service))
            <div>
                <h3 class="text-center" style="margin-top: 40px">
                    لقد قمت فعلا بتقييم هذه الخدمة!
                </h3>
            </div>
        @else
            <div class="bd-form details-text-area" id="bd-form">
                <h3>قيم هذه الخدمة</h3>
                <form wire:submit="submit">
                    <div class="row">
                        <div class="col-md-12">
                            <select wire:model="rating" class="text-right form-select" style="">
                                <option value="{{ \App\Enums\Rating::Bad->value }}" selected>{{ \App\Enums\Rating::Bad->translate() }}</option>
                                <option value="{{ \App\Enums\Rating::Good->value }}">{{ \App\Enums\Rating::Good->translate() }}</option>
                                <option value="{{ \App\Enums\Rating::Excellent->value }}">{{ \App\Enums\Rating::Excellent->translate() }}</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <textarea rows="5" name="review" wire:model="review" class="form-control" placeholder="ما رأيك في هذه الخدمة؟" required=""></textarea>
                            <x-input-error :messages="$errors->get('review')" class="mt-2" />
                        </div>
                        <div class="col-md-12">
                            <button class="default-button" type="submit">إرسال</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

    @else
        <div>
            <h3 class="text-center" style="margin-top: 40px">
                قم بتجسيل الدخول لإعطاء تقييم!
            </h3>
        </div>
    @endauth
</div>
