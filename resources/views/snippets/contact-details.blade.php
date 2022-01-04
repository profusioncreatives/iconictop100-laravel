<div class="row g-5 text-center py-5">
    <div class="col-sm-6 mb-3">
        <h6 class="h6 text-gold-gradient">PHONE</h6>
        <a href="tel:{{ setting('site.phone') }}" class="text-base">{{ setting('site.phone') }}</a>
    </div>
    <div class="col-sm-6 mb-3">
        <h6 class="h6 text-gold-gradient">EMAIL</h6>
        <a href="mailto:{{ setting('site.email') }}" class="text-base">{{ setting('site.email') }}</a>
    </div>
    <div class="col-12">
        <h6 class="h6 text-gold-gradient text-center mb-3">
            ADDRESS
        </h6>
        <div class="row justify-content-evenly">
            <div class="col-sm-4 mb-3">
                <h6 class="btn-16 text-white" style="opacity: 0.8;">Corporate Office:</h6>
                <p class="text-base">{{ setting('site.corporate_address') }}</p>
            </div>
            <div class="col-sm-4 mb-3">
                <h6 class="btn-16 text-white" style="opacity: 0.8;">Branch Office:</h6>
                <p class="text-base">{{ setting('site.branch_address') }}</p>
            </div>
        </div>
    </div>
</div>
