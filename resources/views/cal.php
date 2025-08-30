<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Auto Calculator</title>
<style>
    table { 
        border-collapse: collapse; 
        width: 100%; 
        margin-bottom: 20px; 
        position: relative; 
        table-layout: fixed;
    }
    th, td { 
        border: 1px solid #ccc; 
        padding: 8px; 
        text-align: center; 
        word-wrap: break-word;
    }
    input { 
        width: 100%; 
        padding: 6px; 
        box-sizing: border-box;
    }
    th:nth-child(1), td:nth-child(1) { width: 20%; }
    th:nth-child(2), td:nth-child(2) { width: 20%; }
    th:nth-child(3), td:nth-child(3) { width: 60%; }

    .value { 
        font-size: 18px; 
        font-weight: bold; 
        color: #222; 
        background: #f9f9f9;
    }
    .copy-btn {
        position: absolute;
        bottom: -35px;
        right: 0;
        font-size: 12px;
        padding: 6px 12px;
        cursor: pointer;
    }
    .copied-msg {
        position: absolute;
        bottom: -55px;
        right: 0;
        font-size: 12px;
        color: green;
        display: none;
    }
    .table-container {
        display: inline-block;
        position: relative;
        margin-right: 120px; 
        width: 50%;
    }
</style>
</head>
<body>

<h2>Others</h2>
<div class="table-container">
    <table id="otherTable">
        <thead>
            <tr>
                <th>Size (cm)</th>
                <th>Number</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
            <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
            <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
            <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
            <tr><td><input type="number" class="size"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
        </tbody>
    </table>
    <button class="copy-btn" onclick="copyValues('otherTable', this)">Copy</button>
    <div class="copied-msg">Copied!</div>
</div>

<h2>Watches</h2>
<div class="table-container">
    <table id="watchTable">
        <thead>
            <tr>
                <th>Factory</th>
                <th>Number</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr><td><input type="text" class="factory"></td><td><input type="number" class="number"></td><td class="value">0</td></tr>
        </tbody>
    </table>
    <button class="copy-btn" onclick="copyValues('watchTable', this)">Copy</button>
    <div class="copied-msg">Copied!</div>
</div>

<script>
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
        if (dividedValue <= 65) {
            productPrice = dividedValue + 40;
        } else if (dividedValue > 65 && dividedValue <= 199) {
            productPrice = dividedValue * 1.6;
        } else {
            productPrice = dividedValue * 1.5;
        }
    } else if (mainCategory === '1') {
        if (dividedValue <= 100) {
            productPrice = dividedValue + 80;
        } else if (dividedValue >= 101 && dividedValue <= 199) {
            productPrice = dividedValue + 90;
        } else if (dividedValue >= 200 && dividedValue <= 339) {
            productPrice = dividedValue + 100;
        } else {
            productPrice = dividedValue * 1.3;
        }
    }

    return adjustLastDigit(productPrice);
}

function setupOtherTable() {
    const table = document.getElementById('otherTable');
    table.querySelectorAll('tr').forEach(row => {
        const sizeInput = row.querySelector('.size');
        const numberInput = row.querySelector('.number');
        const valueCell = row.querySelector('.value');

        if(sizeInput && numberInput && valueCell){
            function updateValue() {
                const size = sizeInput.value ? `${sizeInput.value}cm ` : "";
                const number = parseFloat(numberInput.value) || 0;
                if(number){
                    const result = calculateValue('113', number);
                    valueCell.textContent = `${size}USD${result}+shipping fees`;
                } else {
                    valueCell.textContent = '0';
                }
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
                const factory = factoryInput.value ? `${factoryInput.value} ` : "";
                const number = parseFloat(numberInput.value) || 0;

                if(number){
                    const result = calculateValue('1', number);
                    valueCell.textContent = `${factory}USD${result}+shipping fees`;
                } else {
                    valueCell.textContent = '0';
                }
            }
            factoryInput.addEventListener('input', updateValue);
            numberInput.addEventListener('input', updateValue);
            updateValue();
        }
    });
}

function copyValues(tableId, btn){
    const table = document.getElementById(tableId);
    const values = [];
    table.querySelectorAll('.value').forEach(cell => {
        if(cell.textContent !== '0'){
            values.push(cell.textContent);
        }
    });
    if(values.length){
        navigator.clipboard.writeText(values.join('\n'));
        const msg = btn.nextElementSibling;
        msg.style.display = "block";
        setTimeout(() => msg.style.display = "none", 1500);
    }
}

setupOtherTable();
setupWatchTable();
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e565d3e298c395d1ce9e507/1j3igdrg8';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
