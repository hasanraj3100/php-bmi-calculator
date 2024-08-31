<?php 

require "views/partials/header.php"; 
require "views/partials/navbar.php"; 
require "views/partials/hero-section.php";?>


<table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
    <thead>
        <tr class="bg-gray-100 border-b border-gray-200">
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Age</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Gender</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Height (cm)</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Weight (kg)</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">BMI</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Recorded At</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($users as $user): ?> 
            <tr>
                <td class="px-6 py-4 text-center text-sm font-medium text-gray-900 border-b border-gray-200"> <?=$user["Name"]; ?> </td>
                <td class="px-6 py-4 text-center text-sm font-medium text-gray-900 border-b border-gray-200"> <?=$user["Age"]; ?> </td>
                <td class="px-6 py-4 text-center text-sm font-medium text-gray-900 border-b border-gray-200"> <?=$user["Gender"]; ?> </td>
                <td class="px-6 py-4 text-center text-sm font-medium text-gray-900 border-b border-gray-200"> <?=$user["Height"]; ?> </td>
                <td class="px-6 py-4 text-center text-sm font-medium text-gray-900 border-b border-gray-200"> <?=$user["Weight"]; ?> </td>
                <td class="px-6 py-4 text-center text-sm font-medium text-gray-900 border-b border-gray-200"> <?=$user["BMI"]; ?> </td>
                <td class="px-6 py-4 text-center text-sm font-medium text-gray-900 border-b border-gray-200"> <?=$user["RecordedAt"]; ?> </td>
            </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>


<?php require "views/partials/footer.php";?>