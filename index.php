<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pin Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pin-generator half-width">
                    <input id="display-pin"  class="form-control" type="text">
                    <button onclick ="generatePin()" class="generate-btn">Generate Pin</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-section half-width">
                    <input id="typed-numbers" class="form-control" type="text">
                    <div class="numbers">
                        <div id="key-pad" class="calc-body">
                            <div class="calc-button-row">
                              <div class="button">7</div>
                              <div class="button">8</div>
                              <div class="button">9</div>
                            </div>
                            <div class="calc-button-row">
                              <div class="button">4</div>
                              <div class="button">5</div>
                              <div class="button">6</div>
                            </div>
                            <div class="calc-button-row">
                              <div class="button">1</div>
                              <div class="button">2</div>
                              <div class="button">3</div>
                            </div>
                            <div class="calc-button-row">
                                <div class="button">&lt;</div>
                                <div class="button">0</div>
                                <div class="button">C</div>
                            </div>
                            <div>
                                <button onclick="verifyPin()" type="submit" class="submit-btn">Submit</button>
                                <p class="action-left">3 try left</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="notify-section">
            <p id="notify-fail" class="notify">❌ Pin Didn't Match, Please try again</p>
            <p id="notify-success" class="notify">✅ Pin Matched... Secret door is opening for you</p>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>


////////////////////////////use event bubble to create calculator and clear start //////////////////////////////////
document.getElementById('key-pad').addEventListener('click', function(event){
 const number =  event.target.innerText;
 const calcInput= document.getElementById('typed-numbers');
 if(isNaN(number)){
    if(number =='C'){
     calcInput.value =''; 
    }
//   console.log("Invalid");
 }else{
 const previousNumber = calcInput.value;
 const newNumber = previousNumber + number;
 calcInput.value = newNumber;
 }
});






////////////////////////////4 digit pin generator start ///////////////////////////////////////////////////////////
 
function getPin(){
  const pin = Math.round(Math.random()*10000)
  const pinString = pin + '';

  if(pinString.length==4){
    return pin;
  }else{
    alert('got 3 digit and calling again',pin);
    return getPin();
  }
}

function generatePin(){
    const pin = getPin();
    document.getElementById('display-pin').value = pin;
    console.log(pin);
}

////////////////////////////4 digit pin generator end ////////////////////////////////////////////////////////////



function verifyPin(){
    // console.log('clicked');
    const pin = document.getElementById('display-pin').value;
    const typedNumbers = document.getElementById('typed-numbers').value;
    const SuccessErrors = document.getElementById('notify-success');
    const failErrors = document.getElementById('notify-fail');

    if(pin==typedNumbers){
        SuccessErrors.style.display = 'block';
        failErrors.style.display = 'none';
        }else{
        SuccessErrors.style.display = 'none';
        failErrors.style.display = 'block';

    }
}

</script>