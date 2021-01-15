<template>
    <div>
    	<div class="breadcrumbs">
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>{{name}}</h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<a href="#">Pages</a>
						<span class="crumbs-span">/</span>
						<span class="current">{{name}}</span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->
	<span class="badge rounded-pill bg-light text-dark tag-pill" style="padding:5px; border-radius:4px; width:100%" v-if="error">{{error}}</span>
	<span class="badge rounded-pill bg-light text-dark tag-pill" style="padding:5px; border-radius:4px" v-if="message">{{message}}</span>
    </div>
</template>
<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import NavBar from '@/Components/Navs/TopNav'
    import global from '@/Mixins/global'

    export default {
        props:['name'],
        mixins:[global]
    }
</script>

