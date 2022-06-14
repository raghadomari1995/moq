<div class="ads-block">
				<div class="cat-block-image">
					<a  href="{{route('ads', $ad->id)}}"><img class="img-fluid" src="{{ asset($ad->image) }}"/></a>
				</div>
				<h5 class="ads-title"><a  href="{{route('ads', $ad->id)}}">{{ $ad->name }}</a></h5>
				<span class="city">{{ $ad->city() }}</span><span class="type type-{{ $ad->type }}">{{$ad->typefront}}</span>
				<h5 class="price link-type-{{ $ad->type }}">{{ $ad->price }} {{ __( 'JD' ) }}</h5>
        <div class="ads-footer">
          <ul class="ads-cats">
            <li>{{ $ad->category() }}</li>
          </ul>
        </div>
			</div>