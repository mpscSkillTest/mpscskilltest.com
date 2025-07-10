// ALL ELEMENTS TO BE USED

console.log('first',)

const result = document.getElementById("result");
const UserInput = document.getElementById("UserInput");
const backspaceSpan = document.getElementById("backspace");
const keyStrokeSpan = document.getElementById("keystroke");
const contentLengthSpan = document.getElementById("contLength");
const mistakesSpan = document.getElementById("mistakes");
const typedWordCountSpan = document.getElementById("typedWordCount");
const pendingWordSpan = document.getElementById("pendingWordCount");
const accuracySpan = document.getElementById("accuracyCount");
//const timerCount = document.getElementById("countdown");
let correct_word = 0;
let accuracyCount = 0;
let typedWordCount = 0;
let remainingWords = 0;
let total_words = 0;
let secondsRemaining;
let intervalId;
let type_language = "";
let EnglishTextReal = "";
let back_space_count = 0;
let mistakeCount = 0;
let lastValue = "";
let pendingCount = 0;
let incorrectWordsFromTypedWord = 0;
let textToType = "";

// userdefined function started
let innerLoopIndex = 0;
let location_string = "";
let key_stroke_count = 0;
let timerInterval = null;
let totalSeconds = 0; // Use this for count-up
let startTime; // Use this for countdown
const totalTimeInSeconds = 600; // 10 minutes for countdown

const SKIP_CHECK_KEYDOWN = {
  Shift: true,
  Alt: true,
  CapsLock: true,
  Tab: true,
  Control: true,
  Enter: true,
};

const SPECIAL_CHECK_KEYDOWN = {
  Backspace: true,
  Delete: true,
};

function getc(lang, pNumber) {

  selectedlang = lang;
  passageNumber = pNumber;
  renderNewQuote(lang, pNumber);
}

function clearCountWindow() {
  keystroke = 0;
  mistakeCount = 0;
  Backspace = 0;
  contLength = 0;
  typedWordCount = 0;
  pendingWordCount = 0;
  accuracyCount = 0;
  backspace = 0;
  back_space_count = 0;
  key_stroke_count = 0;
  lastMatchedCorrectWordIndexFromQuestionPassage = 0;
  lastMatchedCorrectWordIndexFromTypedWords = 0;
  correctWords = 0;
  correct_word = 0;
  wordsCorrectlyTyped = 0;
  expectedWords = 0;
  pendingCount = 0;
  errorCount = 0;
  skippedOrIncorrectWordBetween = 0;
  incorrectWordsFromTypedWord = 0;

  keyStrokeSpan.textContent = 0;
  mistakesSpan.textContent = 0;
  backspaceSpan.textContent = 0;
  contentLengthSpan.textContent = 0;
  typedWordCountSpan.textContent = 0;
  pendingWordSpan.textContent = 0;
  accuracySpan.textContent = 0;
}

function startTimer() {
  // if (test_type === "speed") {
  // Speed Test: Countdown timer
  if (!timerInterval) {
    let timeRemaining = totalTimeInSeconds;
    timerInterval = setInterval(() => {
      timeRemaining--;
      document.getElementById("countdown").textContent =
        formatTime(timeRemaining);
      if (timeRemaining <= 0) {
        stopTimer();
        alert("Time's up!");
        compareEnglishPassages();
      }
    }, 1000);
  }
}

function stopTimer() {
  clearInterval(timerInterval);
  timerInterval = null;
}

function formatTime(seconds) {
  const hours = Math.floor(seconds / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const secondsRemain = seconds % 60;

  return [hours, minutes, secondsRemain]
    .map((val) => (val < 10 ? "0" + val : val))
    .join(":");
}

function findLastSpaceIndex(inputString) {
  let currentIndex = inputString.length - 1;
  while (currentIndex >= 0) {
    if (inputString.charAt(currentIndex) === " ") {
      return currentIndex;
    }
    currentIndex -= 1;
  }
  return -1;
}

function handleEnglishKeyDown(event) {
  if (
    event.key === " " &&
    EnglishTextReal.slice(EnglishTextReal.length - 1) === " "
  ) {
    event.preventDefault();
  }

  // Decrement keystroke count for backspace key
  if (event.code === "Backspace") {
    key_stroke_count -= 1;
    // Increment back space only if there is previous value present
    if (lastValue) {
      back_space_count += 1;
    }

    // Ensure keystroke count is never negative
    if (key_stroke_count < 0) {
      key_stroke_count = 0;
    }

    // Update the keystroke count display
    keyStrokeSpan.textContent = key_stroke_count;
    backspaceSpan.textContent = back_space_count;
  }
}

function handleMarathiKeyDown(event) {
  let currentUserInputValue = UserInput.value;
  const isSpaceKey = event.key === " ";
  const isEmptyValue = !currentUserInputValue.length;
  const isFirstSpace = isSpaceKey && isEmptyValue;
  const isLastLetterIsSpace =
    currentUserInputValue.charAt(currentUserInputValue.length - 1) === " ";

  const isDoubleSpace = isSpaceKey && !isEmptyValue && isLastLetterIsSpace;

  let currentCursorPosition = UserInput.selectionStart || 0;

  if (isFirstSpace || isDoubleSpace) {
    event.preventDefault();
    return;
  }

  const { key } = event;
  let updatedKeyStr = key;

  if (SKIP_CHECK_KEYDOWN[key]) {
    event.preventDefault();
    return;
  }

  // Need to add code for backspace and delete and enter
  if (SPECIAL_CHECK_KEYDOWN[key]) {
    key_stroke_count -= 1;
    updatedKeyStr = "";
    // Increment back space only if there is previous value present
    if (EnglishTextReal.length) {
      back_space_count += 1;
    }

    // Ensure keystroke count is never negative
    if (key_stroke_count < 0) {
      key_stroke_count = 0;
    }

    if (isLastLetterIsSpace && typedWordCount > 0) {
      typedWordCount -= 1;
    }

    EnglishTextReal = EnglishTextReal.slice(0, EnglishTextReal.length - 1);
    currentUserInputValue = currentUserInputValue.slice(
      0,
      currentUserInputValue.length - 1
    );

    if (currentCursorPosition > 0) {
      currentCursorPosition -= 1;
    } else {
      currentCursorPosition = 0;
    }

    // Update the keystroke count display
    keyStrokeSpan.textContent = key_stroke_count;
    backspaceSpan.textContent = back_space_count;
  }

  // if key entered which is does not include mapping return
  // we handle single single letter
  if (updatedKeyStr.length > 1) {
    event.preventDefault();
    return;
  } else if (!SPECIAL_CHECK_KEYDOWN[key]) {
    // update keystrokes
    key_stroke_count += 1;
    keyStrokeSpan.textContent = key_stroke_count;
  }

  if (isSpaceKey) {
    const updatedValue = currentUserInputValue + " ";
    UserInput.value = updatedValue;
    UserInput.selectionStart = currentCursorPosition + 1;
    EnglishTextReal = EnglishTextReal + " ";
    typedWordCount += 1;

    // to count ramining word
    remainingWords = total_words - typedWordCount;
    pendingWordSpan.innerText = remainingWords;

    // Update the word count display
    typedWordCountSpan.textContent = typedWordCount;

    UserInput.scrollTop = UserInput.scrollHeight;
    event.preventDefault();
    return;
  }

  const findLastSpaceIndexInMarathi = findLastSpaceIndex(currentUserInputValue);
  const findLastSpaceIndexInEnglish = findLastSpaceIndex(EnglishTextReal);

  let previousTranslatedValue = "";

  const wordToBeTranslated =
    EnglishTextReal.substring(findLastSpaceIndexInEnglish + 1) + updatedKeyStr;

  EnglishTextReal = EnglishTextReal + updatedKeyStr;

  const translatedWord = convertToMarathiUpdated(wordToBeTranslated);

  let updatedValue = translatedWord;

  if (findLastSpaceIndexInMarathi > 0) {
    previousTranslatedValue = currentUserInputValue.substring(
      0,
      findLastSpaceIndexInMarathi + 1
    );
    updatedValue = previousTranslatedValue + translatedWord;
  } else {
    updatedValue = translatedWord;
  }


  UserInput.value = updatedValue;
  UserInput.selectionStart = updatedValue.length;

  // to count ramining word
  remainingWords = total_words - typedWordCount;
  pendingWordSpan.innerText = remainingWords;

  // Update the word count display
  typedWordCountSpan.textContent = typedWordCount;

  event.preventDefault();
}

const compareEnglishPassages = () => {
  stopTimer();
  document.getElementById("UserInput").disabled = true;
  const inputValue = UserInput.value;
  const expectedValue = textToType;

  const typedWordsArray = inputValue.split(" ");
  const wordsCorrectlyTyped = getLongestContinuousSequence(
    expectedValue,
    inputValue
  );

  const spansStartingWithW = document.querySelectorAll('[id^="w"]');
  // Change the text color to red for all selected spans
  spansStartingWithW.forEach((span) => {
    span.style.color = "red";
  });

  // Complete input is wrong then set accuracy rate to 0
  if (!wordsCorrectlyTyped.length) {
    mistakesSpan.textContent = expectedWords.length;
    accuracySpan.innerText = "0%";
  }

  const {
    correctWords,
    lastMatchedCorrectWordIndexFromQuestionPassage,
    lastMatchedCorrectWordIndexFromTypedWords,
  } = getCorrectWordsHighlighted(
    wordsCorrectlyTyped,
    expectedWords,
    typedWordsArray
  );

  // Get the last element of the array

  const skippedOrIncorrectWordBetween =
    lastMatchedCorrectWordIndexFromQuestionPassage + 1 - correctWords;

  //const incorrectWordsFromTypedWord = typedWordsArray.length - (lastMatchedCorrectWordIndexFromTypedWords + 1);

  //const incorrectWordsFromTypedWord = (typedWordsArray.length - 1) - (lastMatchedCorrectWordIndexFromTypedWords + 1);

  //const errorCount = skippedOrIncorrectWordBetween + incorrectWordsFromTypedWord;

  if (typedWordsArray[typedWordsArray.length - 1] === "") {
    incorrectWordsFromTypedWord =
      typedWordsArray.length -
      1 -
      (lastMatchedCorrectWordIndexFromTypedWords + 1);
  } else {
    incorrectWordsFromTypedWord =
      typedWordsArray.length - (lastMatchedCorrectWordIndexFromTypedWords + 1);
    typedWordCount += 1;
  }

  const pendingCount =
    total_words - (lastMatchedCorrectWordIndexFromQuestionPassage + 1);
  const mistakeCount = expectedWords.length - correctWords;
  const errorCount = mistakeCount - pendingCount + incorrectWordsFromTypedWord;

  const userResults = window.getUserResults({
    expectedWords,
    typedWords: typedWordsArray,
  });


  // Update the word count display
  typedWordCountSpan.textContent = typedWordCount;
  // to count error
  mistakesSpan.textContent = errorCount;

  accuracyCount = (correctWords * 100) / (correctWords + errorCount);
  accuracyCount = accuracyCount.toFixed(2);
  accuracySpan.innerText = `${accuracyCount}%`;

  showResultModal();
  return;
};

// main code FOR ENGLISH start here  
UserInput.addEventListener("input", function (event) {
  if (selectedlang !== "English") {
    event.preventDefault();
    return;
  }

  if (event.inputType !== "deleteContentBackward") {
    // Increment keystroke count for every input event
    key_stroke_count += 1;
    keyStrokeSpan.textContent = key_stroke_count;
  }

  // Get the current user value
  const currentValue = UserInput.value;

  // Check if a space was added or removed
  if (lastValue && currentValue.length > lastValue.length) {
    if (currentValue[currentValue.length - 1] === " ") {
      typedWordCount += 1;
    }
  } else if (lastValue && currentValue.length < lastValue.length) {
    if (lastValue[lastValue.length - 1] === " ") {
      if (typedWordCount > 0) {
        typedWordCount -= 1;
      } else {
        typedWordCount = 0;
      }
    }
  }

  // to count ramining word
  remainingWords = total_words - typedWordCount;
  pendingWordSpan.innerText = remainingWords;

  // Update last value for the next input event
  lastValue = currentValue;

  // Update the word count display
  typedWordCountSpan.textContent = typedWordCount;
});

// new keydown function to check
UserInput.addEventListener("keydown", (event) => {
  startTimer();
  if (selectedlang === "English") {
    handleEnglishKeyDown(event);
  } else {
    handleMarathiKeyDown(event);
  }
});

// Update the renderNewQuote function to accept the selected passage number
const renderNewQuote = (type_language, passageNumber) => {
  clearCountWindow();

  UserInput.value = ""; // Clear textarea
  UserInput.disabled = false;


  // startTimer();
  stopTimer();

  document.getElementById("countdown").textContent = "10:00";

  if (type_language === "Marathi") {
    textToType = sentencesArrayMarathi[passageNumber - 1]; // Array index is 0-based
  } else if (type_language === "hindi") {
    textToType = sentencesArrayHindi[passageNumber - 1]; // Array index is 0-based
  } else {
    textToType = sentencesArrayEnglish[passageNumber - 1]; // Array index is 0-based
  }

  // Clear previous content of result div
  result.innerHTML = "";

  // FUNCTION TO RENDER NEW QUOTE to display
  // const renderNewQuote = (type_language) => {
  //   UserInput.value = ""; //to clear textarea
  //   if (selectedlang === "Marathi") {
  //     const randomIndex = Math.floor(
  //       Math.random() * sentencesArrayMarathi.length
  //     );
  //     textToType = sentencesArrayMarathi[randomIndex];
  //   } else if (type_language === "hindi") {
  //     const randomIndex = Math.floor(Math.random() * sentencesArrayHindi.length);
  //     textToType = sentencesArrayHindi[randomIndex];
  //   } else {
  //     const randomIndex = Math.floor(
  //       Math.random() * sentencesArrayEnglish.length
  //     );
  //     textToType = sentencesArrayEnglish[randomIndex];
  //     UserInput.disabled = false;
  //   }

  const seperator_word = textToType.split(/\s+/);

  //MAKE THE SELECTED PARA INTO ARRAY OF WORDS
  expectedWords = textToType.split(" ");

  // To count the length of para
  const lengthCount = expectedWords.length;

  // to count all words
  contentLengthSpan.textContent = lengthCount;
  total_words = lengthCount;


  // Split the passage into words and render them as spans
  // const seperator_word = textToType.split(/\s+/);
  // let span_id = 0;
  // for (const word of seperator_word) {
  //     const spanElement = document.createElement("span");
  //     spanElement.textContent = word + " "; // Add a space after each word
  //     spanElement.id = "w" + span_id;
  //     result.appendChild(spanElement);
  //     span_id++;
  // }

  // Iterate through the words and create <span> elements
  let span_id = 0;
  for (const word of seperator_word) {
    const spanElement = document.createElement("span");
    spanElement.textContent = word + " "; // Add a space after each word
    spanElement.id = "w" + span_id;
    result.appendChild(spanElement);
    span_id++;
  }
  // result.innerHTML = textToType;
};
