<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Auto Calculator</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 10px;
}
.table-columns {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}
.column {
    flex: 1;
    min-width: 320px;
}
.table-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 12px;
}
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
    margin-left: 50%;
}
.copy-btn:active {
    background: #ddd;
}
.copied-msg {
    font-size: 12px;
    color: green;
    display: none;
    margin-top: 7px;
    float: left;
}
#otherTable th:nth-child(1), #otherTable td:nth-child(1),
#watchTable th:nth-child(1), #watchTable td:nth-child(1) { width: 25%; }
#otherTable th:nth-child(2), #otherTable td:nth-child(2),
#watchTable th:nth-child(2), #watchTable td:nth-child(2) { width: 25%; }
#otherTable th:nth-child(3), #otherTable td:nth-child(3),
#watchTable th:nth-child(3), #watchTable td:nth-child(3) { width: 50%; }
#gamaTable th:nth-child(1), #gamaTable td:nth-child(1),
#bamaTable th:nth-child(1), #bamaTable td:nth-child(1) { width: 25%; }
#gamaTable th:nth-child(2), #gamaTable td:nth-child(2),
#bamaTable th:nth-child(2), #bamaTable td:nth-child(2) { width: 25%; }
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
                    <tr><td><input type="text" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="text" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="text" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="text" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
                    <tr><td><input type="text" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
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
        <!-- Gama Table -->
            <h3>Gama</h3>
            <div class="table-wrapper">
                <table id="gamaTable">
                    <thead>
                        <tr><th>Factory</th><th>Number (CNY)</th><th>Value</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="factory"></td>
                            <td><input type="number" class="number"></td>
                            <td class="value">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="copy-btn" onclick="copyValues('gamaTable', this)">Copy</button>
            <div class="copied-msg">Copied!</div>

            <!-- Bama Table -->
            <h3>Bama</h3>
            <div class="table-wrapper">
                <table id="bamaTable">
                    <thead>
                        <tr><th>Factory</th><th>Number (USD)</th><th>Value</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="factory"></td>
                            <td><input type="number" class="number"></td>
                            <td class="value">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="copy-btn" onclick="copyValues('bamaTable', this)">Copy</button>
            <div class="copied-msg">Copied!</div>
    </div>
</div>

<script>
// ===== Utility Functions =====
function adjustLastDigit(num, allowedDigits = [2, 4, 6, 8]) {
    let n = Math.round(num);
    let last = n % 10;
    let closest = allowedDigits.reduce((prev, curr) => {
        const prevDiff = Math.abs(last - prev);
        const currDiff = Math.abs(last - curr);
        if (currDiff < prevDiff) return curr;
        if (currDiff === prevDiff) return Math.max(curr, prev);
        return prev;
    });
    return n - last + closest;
}

function adjustLastDigits(num, allowedDigits = [0, 2, 4, 6, 8]) {
    return adjustLastDigit(num, allowedDigits);
}

function calculateValue(category, inputValue) {
    let divided = inputValue / 7;
    let price = 0;
    if (category === '113') {
        if (divided <= 65) price = divided + 40;
        else if (divided <= 199) price = divided * 1.6;
        else price = divided * 1.5;
    } else if (category === '1') {
        if (divided <= 100) price = divided + 80;
        else if (divided <= 199) price = divided + 90;
        else if (divided <= 339) price = divided + 100;
        else price = divided * 1.3;
    }
    return adjustLastDigit(price);
}

// ===== Generic Setup Function =====
function setupTable(tableId, updateLogic) {
    const table = document.getElementById(tableId);
    table.querySelectorAll('tr').forEach(row => {
        const inputs = row.querySelectorAll('input');
        const valueCell = row.querySelector('.value');
        if (valueCell) {
            function updateValue() {
                updateLogic(row, inputs, valueCell);
            }
            inputs.forEach(input => input.addEventListener('input', updateValue));
            updateValue();
        }
    });
}

// ===== Setup Specific Tables =====
function setupOtherTable() {
    setupTable('otherTable', (row, inputs, valueCell) => {
        const size = inputs[0].value ? inputs[0].value + "cm " : "";
        const number = parseFloat(inputs[1].value) || 0;
        valueCell.textContent = number ? `${size}USD${calculateValue('113', number)}+shipping fees` : '0';
    });
}

function setupWatchTable() {
    setupTable('watchTable', (row, inputs, valueCell) => {
        const factoryName = inputs[0].value ? inputs[0].value.toUpperCase() + " Factory " : "";
        const number = parseFloat(inputs[1].value) || 0;
        valueCell.textContent = number ? `${factoryName}USD${calculateValue('1', number)}+shipping fees` : '0';
    });
}

function setupGamaTable() {
    setupTable('gamaTable', (row, inputs, valueCell) => {
        const factory = inputs[0].value ? inputs[0].value.toUpperCase() + " Factory" : "";
        const num = parseFloat(inputs[1].value) || 0;
        let result = 0;
        if(num < 1750) result = num + 500;
        else if(num < 2100) result = num + 550;
        else if(num < 3000) result = num + 600;
        else result = num * 1.2;
        result = adjustLastDigits(result);
        valueCell.textContent = num ? `${factory} ${result}CNY+shipping fees` : '0';
    });
}

function setupBamaTable() {
    setupTable('bamaTable', (row, inputs, valueCell) => {
        const factory = inputs[0].value ? inputs[0].value.toUpperCase() + " Factory" : "";
        const raw = parseFloat(inputs[1].value) || 0;
        const num = raw / 7;
        let result = 0;
        if(num < 250) result = num + 70;
        else if(num < 300) result = num + 75;
        else if(num < 400) result = num + 80;
        else result = num * 1.2;
        result = adjustLastDigit(result);
        valueCell.textContent = num ? `${factory} USD${result}+shipping fees` : '0';
    });
}

// ===== Copy Values =====
function copyValues(tableId, btn) {
    const table = document.getElementById(tableId);
    const values = Array.from(table.querySelectorAll('.value'))
        .map(cell => cell.textContent)
        .filter(text => text !== '0');
    if(values.length) {
        navigator.clipboard.writeText(values.join('\n'));
        const msg = btn.nextElementSibling;
        msg.style.display = "block";
        setTimeout(() => msg.style.display = "none", 1500);
    }
    // Clear inputs and reset values
    table.querySelectorAll('input').forEach(input => input.value = '');
    table.querySelectorAll('.value').forEach(cell => cell.textContent = '0');
}

// ===== Initialize All =====
setupOtherTable();
setupWatchTable();
setupGamaTable();
setupBamaTable();
</script>
</body>
</html>