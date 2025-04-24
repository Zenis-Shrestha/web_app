function toggleField(selector, condition) {
    if (Array.isArray(selector)) {
        selector.forEach(sel => {
           $(sel).toggle(condition);
        });
    } else {
        $(selector).toggle(condition);
    }
}

function populateUseCategories(functionalUseId) {
    const categorySelect = $('#use_category_id');
    categorySelect.empty().append('<option value="">Use Category of Building</option>');

    // Parse usecatgs if it's a string
    let categoriesObj;
    try {
        categoriesObj = typeof usecatgs === 'string' ? JSON.parse(usecatgs) : usecatgs;
    } catch (error) {
        console.error('Failed to parse usecatgs:', error);
        $('#use-category').hide();
        return;
    }

    // Validate parsed object
    if (!categoriesObj || typeof categoriesObj !== 'object') {
        console.error('Invalid usecatgs object after parsing:', categoriesObj);
        $('#use-category').hide();
        return;
    }

    // Ensure functionalUseId is a string
    functionalUseId = String(functionalUseId);

    // Get categories for the selected functional use
    const categories = categoriesObj[functionalUseId];
    if (!categories) {
        console.warn(`No categories found for functionalUseId: ${functionalUseId}`);
        $('#use-category').hide();
        return;
    }

    // Populate dropdown
    for (const [catId, catName] of Object.entries(categories)) {
        if (catName && catName.trim() !== '') {
            const escapedCatName = $('<div>').text(catName).html();
            categorySelect.append(`<option value="${catId}">${escapedCatName}</option>`);
        }
    }
}

$('#functional_use_id').on('change', function () {
    const selectedUse = $(this).val();
    populateUseCategories(selectedUse);       
    dynamicBuildingForm.call(this);
});

// Function to handle the dynamic display of fields based on the selected Labels for Buildings
function dynamicBuildingForm() {
    
    // Get the values of the selected Labels
        const buildingType = $('#building_type').val();
        const functionalUses = $('#functional_use_id').val();
        const toiletPresence = $('#toilet-status').val();
        const containmentType = $('#toilet-connection select').val();
        const defecationPlace = $('#defecation-place select').val();
        const municipalWater = $('#water-id select').val();
        const wellPresence = $('#well-presence select').val();
        const swmProvider = $('#swm-service select').val();
        const licStatus = $('#lic-status select').val();

        //Conditions for different Labels
        //Conditions of Building Types
        const isMainBuilding = buildingType === '1';
        const mainAssociateBuilding = buildingType === '1' || buildingType === '2';
        const binMainBuilding = buildingType === '2' || buildingType === '3';
        const isResidentialOrMixedBuilding = (mainAssociateBuilding && (functionalUses === '1' || functionalUses === '2'));
        

        //Condition for Functional Uses and Use Categories
        const functionalUse = ['1', '2', '3', '4'].includes(buildingType);
        const hasCategory = !!functionalUses && (['1', '2', '3', '4'].includes(buildingType));

        //Condition for Office/Business Name
        const officeBusinessName = (functionalUses === '2' || functionalUses === '5' || functionalUses === '6') && (['1', '2', '3', '4'].includes(buildingType));

        //For LIC
        const licName = licStatus === '1' && isMainBuilding;

        //Condition for Toilet Status
        const isToiletPresence = toiletPresence === '1' && mainAssociateBuilding;
        const privateToilet = (mainAssociateBuilding && (functionalUses === '1' || functionalUses === '2')) && (toiletPresence === '1');
        const isToiletConnection = (mainAssociateBuilding && (toiletPresence === '1'));
        const sewerCode = containmentType === '1' && mainAssociateBuilding && toiletPresence === '1';
        const drainCode = containmentType === '2' && mainAssociateBuilding && toiletPresence === '1';
        const binPreConnectedBuilding = (mainAssociateBuilding && (containmentType === '11'));
        const isDefecationPlace = (mainAssociateBuilding && (toiletPresence === '0'));
        const isCommunityToiletName = (mainAssociateBuilding && (defecationPlace === '9'));

        //Conditions for Water Supply and SWM Service
        const isMunicipalWater = municipalWater === '1' && isMainBuilding;
        const isWellInPremises = wellPresence === '1' && isMainBuilding;
        const isSwmProvider = swmProvider === '1' && isMainBuilding;
        const houseImage = buildingType === '1' || buildingType === '2' || buildingType === '4';       

       // Toggle mappings grouped logically for clarity
const toggleMappings = [
    [['.main_building_field', '.main_drinking_water', '.main_swm'], isMainBuilding],
    ['#bin-main-building', binMainBuilding],
    [['.main_associate_building', '.toilet_status'], mainAssociateBuilding],
    ['#functional-use', functionalUse],
    [['#number-households', '.main_pop_field'], isResidentialOrMixedBuilding],
    ['#use-category', hasCategory],
    ['#toilet-info', isToiletPresence],
    ['#sewer-code', sewerCode],
    ['#drain-code', drainCode],
    ['.private_toilet', privateToilet],
    ['#toilet-connection', isToiletConnection],
    ['#containment-id', binPreConnectedBuilding],
    ['#defecation-place', isDefecationPlace],
    ['#ctpt-toilet', isCommunityToiletName],
    ['.water_municipal', isMunicipalWater],
    ['#distance-from-well', isWellInPremises],
    ['.main_swm_id', isSwmProvider],
    ['#house-image', houseImage],
    ['#lic_id', licName],
    ['#office-business', officeBusinessName],
];
// Apply all toggles
toggleMappings.forEach(([selectors, condition]) => toggleField(selectors, condition));
}

// Attach change listeners to relevant form elements
const buildingFormSelectors = [
    '#building_type',
    '#functional_use_id',
    '#toilet-status',
    '#defecation-place',
    '#water-id',
    '#well-presence',
    '#swm-service',
    '#lic-status'
];

$(buildingFormSelectors.join(',')).on('change', function () {
    dynamicBuildingForm.call(this);
});

//Auto-calculate for Population Served
document.addEventListener('DOMContentLoaded', function () {
    var populationFields = document.querySelectorAll(
        'input[name="male_population"], input[name="female_population"], input[name="other_population"]'
    );

    populationFields.forEach(function (field) {
        
        field.addEventListener('input', function () {
            // Retrieve values and check if they're empty; if empty, treat as undefined
            var malePopulation = field.closest('form').querySelector('input[name="male_population"]').value;
            var femalePopulation = field.closest('form').querySelector('input[name="female_population"]').value;
            var otherPopulation = field.closest('form').querySelector('input[name="other_population"]').value;

            // Convert to integers, or leave as 0 if empty
            malePopulation = malePopulation === "" ? 0 : parseInt(malePopulation);
            femalePopulation = femalePopulation === "" ? 0 : parseInt(femalePopulation);
            otherPopulation = otherPopulation === "" ? 0 : parseInt(otherPopulation);

            // Calculate total population
            var totalPopulation = malePopulation + femalePopulation + otherPopulation;

            // Update the 'population_served' field with the new total
            var populationServedField = document.querySelector('input[name="population_served"]');
            if(malePopulation!== 0 || femalePopulation!== 0 || otherPopulation!== 0 )
            {
                populationServedField.value = totalPopulation;
            }
            // Make the 'population_served' field readonly after the value is calculated
            if (malePopulation >= 1 || femalePopulation >= 1 || otherPopulation >= 1 ) {
                populationServedField.readOnly = true; // Set as readonly instead of disabled
            }
            else
            {
                populationServedField.readOnly = false; // Set as readonly instead of disabled
            }
        });
    });
});

function dynamicContainmentForm() {
    const containmentType = $('#toilet-connection select').val();
    const buildingType = $('#building_type').val();
    const pitShape = $('#pit-shape select').val();
    const containmentTypeVal = $('#containment-type select').val();
    const containmentTypePitVal = $('#containment-type-pit select').val();
    const toiletPresence = $('#toilet-status').val();
    const emptiedSepticTank = $('#septic-tank-pit select').val();

    // Conditions for different Labels
    const showContainment =  ((buildingType === '1' || buildingType === '2') && (containmentType === '3' || containmentType === '4') && (toiletPresence === '1'));
    const isContainmentType = containmentType === '3';
    const isContainmentTypePit = containmentType === '4';
    const pitCylinder = pitShape === 'Cylindrical';
    const pitRectangular = pitShape === 'Rectangular';
    const containmentSewerCode = containmentTypeVal === '1';
    const containmentDrainCode = containmentTypeVal === '2';
    const pitContainmentSewerCode = containmentTypePitVal === '13';
    const pitContainmentDrainCode = containmentTypePitVal === '14';
    const lastEmptiedDate = emptiedSepticTank === '1';
    
    // Toggle fields based on the selected Labels
    toggleField('#containment-info', showContainment);
    toggleField('#containment-type', isContainmentType);
    toggleField('#containment-type-pit', isContainmentTypePit);
    toggleField('#septic-tank-chamber', isContainmentType);
    toggleField('#pit-shape', isContainmentTypePit);
    toggleField('.pit_size', pitCylinder);
    toggleField('.tank_size', pitRectangular);
    toggleField('#last-emptied-date', lastEmptiedDate);

    // Determine which code should be shown
    let showDrainCode = containmentDrainCode || pitContainmentDrainCode;
    let showSewerCode = containmentSewerCode || pitContainmentSewerCode;
    // Ensure only one is visible at a time
    if (showDrainCode) {
        showSewerCode = false;
    } else if (showSewerCode) {
        showDrainCode = false;
    }
    // Toggle fields
    toggleField('#containment-drain-code', showDrainCode);
    toggleField('#containment-sewer-code', showSewerCode);    
}

const containmentFormSelectors = [
    '#toilet-connection select',
    '#building_type',
    '#pit-shape select',
    '#containment-type',
    '#containment-type-pit',
    '#toilet-status',
    '#septic-tank-pit'
];

$(containmentFormSelectors.join(',')).on('change', function () {
    dynamicContainmentForm.call(this);
    dynamicBuildingForm.call(this);
});

// Store Data on Reload
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#building_type')) {
        dynamicBuildingForm();
    }

    if (document.querySelector('#toilet-connection')) {
        dynamicContainmentForm();
    }
});