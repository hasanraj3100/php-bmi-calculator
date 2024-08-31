<?php require "views/partials/header.php"; 
require "views/partials/navbar.php"; ?>

<main class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h1 class="text-4xl font-bold text-center text-gray-800"><?=$name;?>'s BMI Result</h1>
        <p class="text-7xl font-extrabold text-center text-indigo-600 mt-6"><?=round($bmi, 1);?></p>
        <p class="text-xl font-semibold text-center text-gray-700 mt-4">
            <?=$name;?> is in the <span class="text-yellow-500"><?=$category;?></span> category.
        </p>
        <p class="text-sm text-gray-600 text-center mt-6">
            Maintaining a healthy weight may reduce the risk of chronic diseases associated with overweight and obesity.
        </p>
        <div class="mt-8 text-center">
            <a href="/" class="text-indigo-500 hover:underline">Calculate Again</a>
        </div>
    </div>
</main>


<?php require "views/partials/footer.php"; ?>