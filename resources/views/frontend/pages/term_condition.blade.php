@extends('frontend.layouts.master')
@section('title') Term & Condition  @endsection
@section('styles')
<style>
   
</style>
@endsection

@section('breadcrumb')

   <!-- BREADCRUMBS SETCTION START -->
        <section class="flat-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumbs">
                            <li class="trail-item">
                                <a href="/" title="">Home</a>
                                <span><img src="{{asset('assets/frontend/images/icons/arrow-right.png')}}" alt=""></span>
                            </li>
                            
                            <li class="trail-end">
                                <a href="#" title="">Term & Condition</a>
                            </li>
                        </ul><!-- /.breacrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content')
<section class="flat-term-conditions">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="term-conditions">
                    <div class="text-wrap">
                        <h3>What are Terms and Conditions</h3>
                        <p>
                        Welcome to Universal Trading Concern!

                        These terms and conditions outline the rules and regulations for the use of Universal Trading Concern's Website, located at <a href="https://universaltrading.com.np/">universaltrading.com.np</a>.

                        By accessing this website we assume you accept these terms and conditions. Do not continue to use <a href="https://universaltrading.com.np/">universaltrading.com.np</a> if you do not agree to take all of the terms and conditions stated on this page.

                        The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Client”, “You” and “Your” refers to you, the person log on this website and compliant to the Company's terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client's needs in respect of provision of the Company's stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.
                        </p>
                    </div><!-- /.text-wrap -->
                   
                </div><!-- /.term-conditions -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-term-conditions -->
@endsection
