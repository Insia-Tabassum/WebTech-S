// Constants
const feePerSeat = 1000;
const discountThreshold = 5000;
const onlineFee = 100;
const onCampusFee = 250;

// DOM Elements
const seatInput = document.getElementById('seat-qty');
const totalFeeDisplay = document.getElementById('total-fee');
const discountMsg = document.getElementById('discount-msg');
const errorMsg = document.getElementById('error-msg');
const classType = document.getElementById('class-type');
const finalAmountDisplay = document.getElementById('final-amount');
const confirmCheckbox = document.getElementById('confirm');
const submitBtn = document.getElementById('submit-btn');

// Initial calculation
let totalFee = feePerSeat;

// Function to update total course fee
function updateTotalFee() {
    let seats = parseInt(seatInput.value);

    if (isNaN(seats) || seats < 1) {
        errorMsg.textContent = "Quantity must be at least 1!";
        seatInput.value = 1;
        seats = 1;
    } else {
        errorMsg.textContent = "";
    }

    totalFee = seats * feePerSeat;
    totalFeeDisplay.textContent = totalFee;

    if (totalFee > discountThreshold) {
        discountMsg.textContent = "You are eligible for a special discount.";
    } else {
        discountMsg.textContent = "";
    }

    updateFinalAmount();
}

// Function to update final payable amount based on class type
function updateFinalAmount() {
    let extraFee = classType.value === "online" ? onlineFee : onCampusFee;
    finalAmountDisplay.textContent = totalFee + extraFee;
}

// Event listeners
seatInput.addEventListener('input', updateTotalFee);
classType.addEventListener('change', updateFinalAmount);
confirmCheckbox.addEventListener('change', () => {
    submitBtn.style.display = confirmCheckbox.checked ? 'block' : 'none';
});

// Initial setup
updateTotalFee();