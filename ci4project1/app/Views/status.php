<?= $this->extend('/base'); ?>

<?= $this->section('content'); ?>
<div class="bg-blue-500">
        <div class="flex justify-center container mx-auto my-auto w-screen h-screen items-center flex-col">
            <div class="text-slate-100 items-center">
                <svg class="w-10 h-10 mx-auto pb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <div class="text-center pb-3">Welcome back!</div>
            </div>
            <div class="flex justify-center container mx-auto mt-6 text-slate-100 text-sm">
                <div class="flex flex-col sm:flex-row  justify-between md:w-1/2 items-center">
                    <a class="flex" >Forgot your password</a>
                    <a class="flex" >Don't have an account? Get Started</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection('content'); ?>