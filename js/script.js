// var score=0;

// function checkAnswer(quizForm,
//                      theAnswer,
//                      urlRight,
//                      urlWrong)
// {
//   var s = "?";
//   var i = 0;
//   for(;i<quizForm.elements.length;i++)
//   {
//     if(("cc" ==
//         quizForm.elements[i].name) &&
//        (quizForm.elements[i].checked))
//     {
//       s = quizForm.elements[i].value;
//     }
//   }
//   if("?" == s)
//   {
//     alert("Please make a selection.");
//     return false;
//   }
//   if(s == theAnswer)
//   {
//  	score++;
//     alert("'"+s+"' is correct!");
//     if(urlRight)
//     {

//     document.location.href = urlRight;
//     }
//   }
//   else
//   {
//     alert("'"+s+"' is incorrect.");
//     if( urlWrong )
//     {

//     document.location.href = urlWrong;
//     }
//   }
//   return false;
// }

