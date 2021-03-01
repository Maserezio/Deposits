const initialFee = document.getElementById('initial-fee');
const term = document.getElementById('term');
const send = document.getElementById('butt');

const initialFeeRange = document.getElementById('initial-fee-range');
const termRange = document.getElementById('term-range');

const finalSumm = document.getElementById('final-summ');
const startSumm = document.getElementById('start-summ');

const inputRange = document.querySelectorAll('.input-range');

const bankBtns = document.querySelectorAll('.bank');

const assignValue = () => {
  initialFee.value = initialFeeRange.value;
  term.value = termRange.value;
  startSumm.innerHTML = `${initialFee.value} ₽|€|$`;
}

assignValue();

const bank  = [
  {
    name:'citi',
    percent:5.0,
    minRange:30,
    maxRange:365,
    minSumm:1,
    maxSumm:1000000
  },

  {
    name:'mkb',
    percent:6.0,
    minRange:30,
    maxRange:365,
    minSumm:1,
    maxSumm:1500000
  },

  {
    name:'tinkoff',
    percent:4.7,
    minRange:91,
    maxRange:730,
    minSumm:50000,
    maxSumm:1000000
  },

  {
    name:'skb',
    percent:5.2,
    minRange:270,
    maxRange:270,
    minSumm:10000,
    maxSumm:100000000
  },

  {
    name:'gazprombank',
    percent:5.96,
    minRange:367,
    maxRange:1095,
    minSumm:50000,
    maxSumm:1000000
  },

  {
    name:'keb',
    percent:5.75,
    minRange:1098,
    maxRange:1098,
    minSumm:100000,
    maxSumm:1000000
  }
]
let currentPercent = bank[0].percent

  for(let bank of bankBtns) {
    bank.addEventListener('click', ()=> {
      for(let item of bankBtns) {
         item.classList.remove('active');
      }
        bank.classList.add('active');
        takeActiveBank(bank);
        assignValue();
        calculation();
    })
  }

  const takeActiveBank = currentActive => {
    const dataAttrValue = currentActive.dataset.name;
    const currentBank = bank.find(bank => bank.name === dataAttrValue);
    currentPercent = currentBank.percent;
    termRange.setAttribute('min', currentBank.minRange);
    termRange.setAttribute('max', currentBank.maxRange);
    initialFeeRange.setAttribute('min', currentBank.minSumm);
    initialFeeRange.setAttribute('max', currentBank.maxSumm);
    termRange.value = currentBank.minRange;
    initialFeeRange.value = currentBank.minSumm;
    assignValue();
  }

  for(let input of inputRange){
       input.addEventListener('input', ()=> {
       assignValue();
       calculation();
    })
  }

  const calculation = () => {
    let firstSumm = initialFee.value;
    let fiSumm = initialFee.value;
    let termin = term.value;
    let perc = currentPercent;
    let  fSumm = ((firstSumm*perc*(termin/365))/100);
    fSumm = Math.round(fSumm);
    finalSumm.innerHTML = `${fSumm*1+firstSumm*1} ₽|€|$`;
  }
