@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title') Honda Egypt fivestars @endsection


@section('content')


<div class="wrapper normal container" id="About">

		<!-- <div class="title_box_fx"> -->
			<section class="title_box_set">
				<div class="title_box_border"></div>
				<div class="box_set box_red" style="left: 0px; top: 0px;">
					<div class="box_five_stars pt1" style="left: 0px; transform: rotate(0deg);"></div>				
					<div class="box_five_stars pt2" style="left: 0px; transform: rotate(0deg);"></div>				
				</div>
				<div class="box_title" style="top: 0px;">{{__('Honda Five Star Service')}}</div>
			</section>
		<!-- </div> -->

	</div>



    <div class="wrapper fstars container" id="FiveStars">
		<section class="fs_block" style="opacity: 1;">
			<div class="fs_logo_set">
				<div class="fs_logo warranty" style="top: 0px;"></div>
			</div>
			<div class="fs_data_set">
				<div class="fs_title">{{__('Warranty')}}</div>
				<div class="fs_details">
						@if(resolve('lang') == 'en')
							Highest Warranty 125,000 Km or 5 Years<br>Warranty is the biggest surprise for all our customers, we are confident from our products of Honda cars and this has raised the guarantee to 5 years or 125 thousand kilometers. We challenge that what we have presented by increasing the duration of the warranty or the number of kilometers because our cars  are simply unbeatable.
						@else
							أعلى ضمان - ٥ سنوات او ١٢٥ ألف كم<br>
							الضــــمان هـــو المفــاجأة الكــــبرى للجــميع فنــحن علـــى ثـــقة مــــن منتجــــاتنا من سيارات هوندا ولهذا فقــد رفعــنا ضمانها إلى 5 سنوات أو 125 ألف كـيــلو . نحــن نتحدى بـما قـدمـناه مــن زيـادة مــدة الضـــمان أو عــدد الكـــيلو متــرات لأن سياراتنا لا تقبـل المنافسة ولدينا الثقة فيما تقدمه هوندا للسوق المصر
						@endif
					

				</div>
			</div>
		</section>

		<section class="fs_block" style="opacity: 1;">
			<div class="fs_logo_set">
				<div class="fs_logo trade_in" style="top: 0px;"></div>
			</div>
			<div class="fs_data_set">
				<div class="fs_title">{{__('Trade In')}} </div>
				<div class="fs_details">
			
						@if(resolve('lang') == 'en')
							Trade in your Honda with a new one<br>We offer to our customers the Trade in service, which makes them able to replace their old Honda (up to 5 years old) with any of our new models or they can simply sell it to us. Also we offer to our customers the ability to purchase a fully guaranteed used cars in outstanding conditions from Honda’s Trade In department.
						@else


							خدمة شراء سيارتـك الهوندا المستعملة أو استبدالها<br>
								نحــن نقــدم النجــمة الخــــامسة لعـــملائنا وهــى استبدال سيـارات هــونـدا بأخـريات بنظام الاستبدال بحـد ادني سيـارات هـوندا من إنتاج 2007 , حـــيث يمــكن للــعـميل بـيع سيارته المستعملة فـقط أو شـراء سيارة مستــــــعمله مــعـتمده ومــــضمـونه مــن إدارة استبـــــدال هوندا أو يمكنه استبــــدال ســيارته المستعملة بجديدة مـــع سـداد الفــارق



						@endif
					

			</div>
			</div>
			<a href="{{ url('trade-in') }}" class="fs_button">{{__('Trade in Your Car')}}</a>
		</section>

		<section class="fs_block" style="opacity: 1;">
			<div class="fs_logo_set">
				<div class="fs_logo maintenancee" style="top: 0px;"></div>
			</div>
			<div class="fs_data_set">
				<div class="fs_title">{{__('Maintenance')}} </div>
				<div class="fs_details">
			
						@if(resolve('lang') == 'en')
							Lowest maintenance fees<br>At Honda we provide cheaper maintenance prices compared with other automotive service centers, so we put a price list in the waiting area that describes all the costs that are pilled to the customer.
						@else


						أعلى توفير في الصـيانـــة<br>
نحــن نتمــيز بـأننا أوفــر أسـعار في الصيـــانة بالمـــقـارنة مـــع مـــراكز خــدمة السيـــارات الأخـــرى وقــمنا بوضــع لائحـــة للأســـعار الخــاصة للســـيارات عنـد الصيانة في مكان واضــح في مكان استراحة العملاء ليعــرف العـــملاء قيمة ما يتحمله عند سداد الفاتورة في كل مرحله من مراحل الصيانة



						@endif

			
			
			</div>
			</div>
			<a href="{{ url('maintenance') }}" class="fs_button">{{__('Book Maintenance')}}</a>
		</section>

		<section class="fs_block" style="opacity: 1;">
			<div class="fs_logo_set">
				<div class="fs_logo test_drive" style="top: 0px;"></div>
			</div>
			<div class="fs_data_set">
				<div class="fs_title">{{__('Test Drive')}}  </div>
				<div class="fs_details">
			
						@if(resolve('lang') == 'en')
							Test Drive all our models<br>It’s necessary when you buy any product to experience it, and this is what we have done. We made each car model available to our customers in order to enjoy a full experience before taking the decision of purchasing , that experience has to help the client make the decision easily.
						@else


							تجربة القيادة لـكل المـوديلات<br>
							لابـد عند شــراء أي سـلعة أن تقوم بتجـربتها وهذا ما قمنا به بأن قمنا بتخـصـيص سيارة مـن كـل موديل للتــجربة عنــــد رغــــبة العــــميل في ذلـك فالتجــربة تســـاعد الــعــميل على اتخاذ القرار بسهولة



						@endif

			</div>
			</div>
			<a href="{{ url('test-drive') }}" class="fs_button">{{__('Request Test Drive')}}</a>
		</section>

		<section class="fs_block last" style="opacity: 1;">
			<div class="fs_logo_set">
				<div class="fs_logo insurance" style="top: 0px;"></div>
			</div>
			<div class="fs_data_set">
				<div class="fs_title">{{__('Insurance')}} </div>
				<div class="fs_details">
			
						@if(resolve('lang') == 'en')
						Comprehensive insurance on the car<br>We at Honda tried to set the best features of an insurance policy in the Egyptian market in terms of the conditions, procedures and value. Noting that there is a representative of the insurance company that always at the headquarters of Honda in order to take immediate actions.
						@else

						تأميـن شـامل عـلى السـيـارة<br>
نحــن في هــوندا تـوصلنا لأفــضل مـمـيزات وثيــقة تأمـين في السوق المصـــــرية مـــن حـــيث الشـــــروط والإجراءات والقيمة. علما بأنه يوجد منــدوب لشــركة التـــأمين متواجد دائـما فـي مقر هوندا لعمل جميع الإجراءات الفوريه



						@endif

			</div>
			</div>
		</section>
	</div>



@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaFiveStarsLoad();
		});
	</script>
@endsection
