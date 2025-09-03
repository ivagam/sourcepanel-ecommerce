<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Auto Calculator</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 10px;
}

/* Flex container for desktop two-column layout */
.table-columns {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

/* Left and right columns */
.column {
    flex: 1;
    min-width: 320px;
}

/* Wrapper for scroll on mobile */
.table-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 12px;
}

/* Base table styling */
table { 
    border-collapse: collapse; 
    width: 100%; 
    min-width: 320px;
}

th, td { 
    border: 1px solid #ddd; 
    padding: 6px; 
    text-align: center; 
    font-size: 14px;
}

input { 
    width: 95%; 
    padding: 5px; 
    font-size: 13px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.value { 
    font-size: 14px; 
    font-weight: bold; 
    background: #f9f9f9;
    padding: 6px;
}

.copy-btn {    
    padding: 4px 10px;
    font-size: 13px;
    border: 1px solid #aaa;
    background: #f1f1f1;
    border-radius: 4px;
    cursor: pointer;
}
.copy-btn:active {
    background: #ddd;
}
.copied-msg {
    font-size: 12px;
    color: green;
    display: none;
    margin-top: 2px;
}

/* Column width proportion */
#otherTable th:nth-child(1), #otherTable td:nth-child(1),
#watchTable th:nth-child(1), #watchTable td:nth-child(1) { width: 25%; }

#otherTable th:nth-child(2), #otherTable td:nth-child(2),
#watchTable th:nth-child(2), #watchTable td:nth-child(2) { width: 25%; }

#otherTable th:nth-child(3), #otherTable td:nth-child(3),
#watchTable th:nth-child(3), #watchTable td:nth-child(3) { width: 50%; }

/* Gama / Bama — narrow number column */
#gamaTable th:nth-child(1), #gamaTable td:nth-child(1),
#bamaTable th:nth-child(1), #bamaTable td:nth-child(1) { width: 20%; }

#gamaTable th:nth-child(2), #gamaTable td:nth-child(2),
#bamaTable th:nth-child(2), #bamaTable td:nth-child(2) { width: 80%; }

/* Responsive: mobile single column */
@media (max-width: 768px) {
    .table-columns { flex-direction: column; }
}
</style>
</head>
<body>

<div class="table-columns">
    <!-- Left Column -->
    <div class="column">
        <h3>Others</h3>
        <div class="table-wrapper">
            <table id="otherTable">
                <thead>
                    <tr><th>Size (cm)</th><th>Number</th><th>Value</th></tr>
                </thead>
                <tbody>
                    <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                </tbody>
            </table>
        </div>
        <button class="copy-btn" onclick="copyValues('otherTable', this)">Copy</button>
        <div class="copied-msg">Copied!</div>

        <h3>Watches</h3>
        <div class="table-wrapper">
            <table id="watchTable">
                <thead>
                    <tr><th>Factory</th><th>Number</th><th>Value</th></tr>
                </thead>
                <tbody>
                    <tr><td><input type="text" class="factory"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                </tbody>
            </table>
        </div>
        <button class="copy-btn" onclick="copyValues('watchTable', this)">Copy</button>
        <div class="copied-msg">Copied!</div>
    </div>

    <!-- Right Column -->
    <div class="column">
        <h3>Gama</h3>
        <div class="table-wrapper">
            <table id="gamaTable">
                <thead>
                    <tr><th>Number (CNY)</th><th>Value</th></tr>
                </thead>
                <tbody>
                    <tr><td><input type="number" class="number"></td><td class="value">0</td></tr>
                </tbody>
            </table>
        </div>
        <button class="copy-btn" onclick="copyValues('gamaTable', this)">Copy</button>
        <div class="copied-msg">Copied!</div>

        <h3>Bama</h3>
        <div class="table-wrapper">
            <table id="bamaTable">
                <thead>
                    <tr><th>Number (USD)</th><th>Value</th></tr>
                </thead>
                <tbody>
                    <tr><td><input type="number" class="number"></td><td class="value">0</td></tr>
                </tbody>
            </table>
        </div>
        <button class="copy-btn" onclick="copyValues('bamaTable', this)">Copy</button>
        <div class="copied-msg">Copied!</div>
    </div>
</div>

<script>
// ===== Utility Functions =====
function adjustLastDigit(num) {
    let n = Math.round(num);
    let lastDigit = n % 10;
    const allowedDigits = [2, 4, 6, 8];
    let closest = allowedDigits.reduce((prev, curr) => {
        const prevDiff = Math.abs(lastDigit - prev);
        const currDiff = Math.abs(lastDigit - curr);
        if (currDiff < prevDiff) return curr;
        if (currDiff === prevDiff) return Math.max(curr, prev);
        return prev;
    });
    return n - lastDigit + closest;
}
function calculateValue(mainCategory, inputValue) {
    let dividedValue = inputValue / 7;
    let productPrice = 0;
    if (mainCategory === '113') {
        if (dividedValue <= 65) productPrice = dividedValue + 40;
        else if (dividedValue <= 199) productPrice = dividedValue * 1.6;
        else productPrice = dividedValue * 1.5;
    } else if (mainCategory === '1') {
        if (dividedValue <= 100) productPrice = dividedValue + 80;
        else if (dividedValue <= 199) productPrice = dividedValue + 90;
        else if (dividedValue <= 339) productPrice = dividedValue + 100;
        else productPrice = dividedValue * 1.3;
    }
    return adjustLastDigit(productPrice);
}

// ===== Setup Tables =====
function setupOtherTable() {
    const table = document.getElementById('otherTable');
    table.querySelectorAll('tr').forEach(row => {
        const sizeInput = row.querySelector('.size');
        const numberInput = row.querySelector('.number');
        const valueCell = row.querySelector('.value');
        if(sizeInput && numberInput && valueCell){
            function updateValue() {
                const size = sizeInput.value ? sizeInput.value + "cm " : "";
                const number = parseFloat(numberInput.value)||0;
                valueCell.textContent = number ? `${size}USD${calculateValue('113',number)}+shipping fees` : '0';
            }
            sizeInput.addEventListener('input', updateValue);
            numberInput.addEventListener('input', updateValue);
            updateValue();
        }
    });
}
function setupWatchTable() {
    const table = document.getElementById('watchTable');
    table.querySelectorAll('tr').forEach(row => {
        const factoryInput = row.querySelector('.factory');
        const numberInput = row.querySelector('.number');
        const valueCell = row.querySelector('.value');
        if(factoryInput && numberInput && valueCell){
            function updateValue() {
                const factory = factoryInput.value ? factoryInput.value + " " : "";
                const number = parseFloat(numberInput.value)||0;
                valueCell.textContent = number ? `${factory}USD${calculateValue('1',number)}+shipping fees` : '0';
            }
            factoryInput.addEventListener('input', updateValue);
            numberInput.addEventListener('input', updateValue);
            updateValue();
        }
    });
}
function setupGamaTable() {
    const table = document.getElementById('gamaTable');
    table.querySelectorAll('tr').forEach(row => {
        const numberInput = row.querySelector('.number');
        const valueCell = row.querySelector('.value');
        if(numberInput && valueCell){
            function updateValue() {
                const num = parseFloat(numberInput.value)||0;
                let result = 0;
                if(num<1750) result=num+500;
                else if(num<2100) result=num+550;
                else if(num<3000) result=num+600;
                else result=num*1.2;
                result=Math.round(result);
                valueCell.textContent = num?`${result}CNY+shipping fees`:'0';
            }
            numberInput.addEventListener('input', updateValue);
            updateValue();
        }
    });
}
function setupBamaTable() {
    const table = document.getElementById('bamaTable');
    table.querySelectorAll('tr').forEach(row => {
        const numberInput = row.querySelector('.number');
        const valueCell = row.querySelector('.value');
        if(numberInput && valueCell){
            function updateValue() {
                const raw = parseFloat(numberInput.value)||0;
                const num = raw / 7;
                let result = 0;
                if(num<250) result=num+70;
                else if(num<300) result=num+75;
                else if(num<400) result=num+80;
                else result=num*1.2;
                result=Math.round(result);
                valueCell.textContent = num?`USD${result}+shipping fees`:'0';
            }
            numberInput.addEventListener('input', updateValue);
            updateValue();
        }
    });
}

// ===== Copy Function =====
function copyValues(tableId, btn){
    const table = document.getElementById(tableId);
    const values = [];
    table.querySelectorAll('.value').forEach(cell => {
        if(cell.textContent!=='0') values.push(cell.textContent);
    });
    if(values.length){
        navigator.clipboard.writeText(values.join('\n'));
        const msg = btn.nextElementSibling;
        msg.style.display="block";
        setTimeout(()=>msg.style.display="none",1500);
    }
}

setupOtherTable();
setupWatchTable();
setupGamaTable();
setupBamaTable();
</script>

</body>
</html>
