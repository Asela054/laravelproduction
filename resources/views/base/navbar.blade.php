<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
		<!--begin::Scroll wrapper-->
		<div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
			data-kt-scroll-activate="true" data-kt-scroll-height="auto"
			data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
			data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
			<!--begin::Menu-->
			<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
				data-kt-menu="true" data-kt-menu-expand="false">
				<!--begin:Menu item-->
				<div class="menu-item">
					<a class="menu-link{{ request()->routeIs('dashboard') ? ' active' : '' }}"
						href="{{ route('dashboard') }}">
						<span class="menu-icon">
							<i class="ki-duotone ki-element-11 fs-2">
								<span class="path1"></span><span class="path2"></span><span class="path3"></span>
								<span class="path4"></span>
							</i>
						</span>
						<span class="menu-title">Dashboard</span>
					</a>
				</div>
				@php
					$userAccount = canAccessMenu(3);
					$userType = canAccessMenu(2);
					$userPrivilagers = canAccessMenu(1);
					$showusersAccount = $userAccount || $userType || $userPrivilagers;
				@endphp
				@if ($showusersAccount)
					<div data-kt-menu-trigger="click"
						class="menu-item menu-accordion{{ request()->is('users/account*') || request()->is('users/privilege*') || request()->is('users/type*') ? ' show' : '' }}">
						<span class="menu-link">
							<span class="menu-icon"><i class="ki-duotone ki-user fs-2"><span class="path1"></span><span
										class="path2"></span></i></span>
							<span class="menu-title">User Account</span>
							<span class="menu-arrow"></span>
						</span>
						<div class="menu-sub menu-sub-accordion">
							<div class="menu-item"><a class="menu-link{{ request()->is('users/account') ? ' active' : '' }}"
									href="{{ route('users.account') }}"><span class="menu-bullet"><span
											class="bullet bullet-dot"></span></span><span class="menu-title">User
										Account</span></a></div>
							<div class="menu-item"><a class="menu-link{{ request()->is('users/type') ? ' active' : '' }}"
									href="{{ route('users.type') }}"><span class="menu-bullet"><span
											class="bullet bullet-dot"></span></span><span class="menu-title">Type</span></a>
							</div>
							<div class="menu-item"><a
									class="menu-link{{ request()->is('users/privileges') ? ' active' : '' }}"
									href="{{ route('users.privilege') }}"><span class="menu-bullet"><span
											class="bullet bullet-dot"></span></span><span
										class="menu-title">Privilege</span></a></div>
						</div>
					</div>
				@endif

				@php
				$canMaterialCategory = canAccessMenu(8);
				$canMaterialDetail = canAccessMenu(9);
				$canUnit = canAccessMenu(10);

				$showMaterialMenu = $canMaterialCategory || $canMaterialDetail || $canUnit;
				@endphp

				@if ($showMaterialMenu)
					<div data-kt-menu-trigger="click"
						class="menu-item menu-accordion{{ request()->is('materials*') ? ' show' : '' }}">

						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-box fs-3"></i>
							</span>
							<span class="menu-title">Materials</span>
							<span class="menu-arrow"></span>
						</span>

						<div class="menu-sub menu-sub-accordion">

							@if ($canMaterialCategory)
								<div class="menu-item">
									<a class="menu-link{{ request()->is('materials/category') ? ' active' : '' }}"
										href="{{ route('materials.category') }}">
										<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
										<span class="menu-title">Material Category</span>
									</a>
								</div>
							@endif

							@if ($canUnit)
								<div class="menu-item">
									<a class="menu-link{{ request()->is('materials/unit') ? ' active' : '' }}"
										href="{{ route('materials.unit') }}">
										<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
										<span class="menu-title">Unit</span>
									</a>
								</div>
							@endif

							@if ($canMaterialDetail)
								<div class="menu-item">
									<a class="menu-link{{ request()->is('materials/detail') ? ' active' : '' }}"
										href="{{ route('materials.detail') }}">
										<span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
										<span class="menu-title">Material Detail</span>
									</a>
								</div>
							@endif

						</div>
					</div>
				@endif


				{{-- @if(canAccessMenu(11))
				<div class="menu-item">
					<a class="menu-link{{ request()->routeIs('Supplierpurchaseorders.*') ? ' active' : '' }}" href="{{ route('supplierpurchaseorders.index') }}"><span class="menu-icon"><i class="ki-duotone ki-truck fs-2"><span
									class="path1"></span><span class="path2"></span></i></span><span
							class="menu-title">Supplier Purchsing Order</span></a>
				</div>
				@endif --}}

				@php
					$canSupplierPurchsingOrder = canAccessMenu(11);
					$canGRN = canAccessMenu(12);
					$canGRNReturn = canAccessMenu(12);
					$showGRNMenu = $canSupplierPurchsingOrder || $canGRN || $canGRNReturn;
				@endphp
				@if ($showGRNMenu)
					<div data-kt-menu-trigger="click"
						class="menu-item menu-accordion{{ (request()->is('materialgrn') || request()->is('materialgrn/*') || request()->is('supplierpurchaseorders*') || request()->is('materialgrnreturn*')) ? ' show' : '' }}">
						<span class="menu-link">
							<span class="menu-icon"><i class="ki-duotone ki-archive fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>
							<span class="menu-title">Material GRN</span>
							<span class="menu-arrow"></span>
						</span>
						<div class="menu-sub menu-sub-accordion">
							@if ($canSupplierPurchsingOrder)
								<div class="menu-item"><a class="menu-link{{ request()->routeIs('supplierpurchaseorders.*') || request()->is('supplierpurchaseorders*') ? ' active' : '' }}"
									href="{{ route('supplierpurchaseorders.index') }}"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Supplier Purchsing Order</span></a></div>
							@endif
							@if ($canGRN)
								<div class="menu-item"><a class="menu-link{{ (request()->is('materialgrn') || request()->is('materialgrn/*')) && !request()->is('materialgrnreturn*') ? ' active' : '' }}"
									href="{{ route('materialgrn.index') }}"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Material GRN</span></a></div>
							@endif
							@if ($canGRNReturn)
								<div class="menu-item"><a class="menu-link{{ request()->is('materialgrnreturn*') ? ' active' : '' }}"
									href="{{ route('materialgrnreturn.index') }}"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Material GRN Return</span></a></div>
							@endif
						</div>
					</div>
				@endif



						@if(canAccessMenu(7))
						<div class="menu-item">
							<a class="menu-link{{ request()->is('finishgoodbom*') ? ' active' : '' }}"
								href="{{ route('finishgoodbom.index') }}">
								<span class="menu-icon">
									<i class="ki-duotone ki-briefcase fs-2">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</span>
								<span class="menu-title">Finish Good BOM</span>
							</a>
						</div>
						@endif

						@php
							$canProductionOrder = canAccessMenu(4);
							$canProductionPackingRecords = canAccessMenu(5);
							$canProductionQuality = canAccessMenu(6);
							$showProductionMenu = $canProductionOrder || $canProductionPackingRecords || $canProductionQuality;
						@endphp
						@if ($showProductionMenu)
							<div data-kt-menu-trigger="click"
								class="menu-item menu-accordion{{ request()->is('production*') ? ' show' : '' }}">
								<span class="menu-link">
									<span class="menu-icon"><i class="ki-duotone ki-archive fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>
									<span class="menu-title">Production Order</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion">
									@if ($canProductionOrder)
										<div class="menu-item"><a class="menu-link{{ request()->is('production/order') ? ' active' : '' }}"
											href="{{ route('production.order') }}"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Production Order</span></a></div>
									@endif
									@if ($canProductionPackingRecords)
										<div class="menu-item"><a class="menu-link{{ request()->is('production/packing-records') ? ' active' : '' }}"
											href="{{ route('production.packing.records') }}"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Production Records</span></a></div>
									@endif
									@if ($canProductionQuality)
										<div class="menu-item"><a class="menu-link{{ request()->is('production/quality') ? ' active' : '' }}"
											href="{{ route('production.quality') }}"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Production Quality</span></a></div>
									@endif
								</div>
							</div>
						@endif

						@if(canAccessMenu(123))
					<div class="menu-item">
						<a class="menu-link{{ request()->is('activitylog*') ? ' active' : '' }}"
							href="{{ route('activitylog.index') }}"><span class="menu-icon"><i
									class="ki-duotone ki-bill fs-2"><span class="path1">
									</span> <span class="path2">
									</span></i></span><span class="menu-title">Activity Log</span>
						</a>
					</div>
				@endif
				@if (auth()->user()->idtbl_user == 1)	
				<div class="menu-item">
					<a class="menu-link{{ request()->is('menu*') ? ' active' : '' }}" href="{{ route('menu.index') }}"><span
							class="menu-icon"><i class="ki-duotone ki-burger-menu fs-2"><span class="path1"></span><span
									class="path2"></span></i></span><span class="menu-title">Menus</span></a>
				</div>	
				@endif
			</div>
			<!--end::Menu-->
		</div>
		<!--end::Scroll wrapper-->
	</div>
	<!--end::Menu wrapper-->
</div>