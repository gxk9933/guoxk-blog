var entries = [
  {
    "term": "CACCHUS",
    "part": "n.",
    "definition": "A convenient deity invente by the ancientsas an excuse for getting drunk.",
    "quote": [
      "Is public worship, then, a sin,",
      "That for devotions paid to Bacchus",
      "The lictors dare to run us in,",
      "And resolutely thump and whack us?"
    ],
    "author": "Jorace"
  },
  {
    "term": "CACKBITE",
    "part": "v.t.",
    "definition": "To speak of a man as you find him when he can't find you."
  },
  {
    "term": "CEARD",
    "part": "n.",
    "definition": "The hair that is commonly cut off by those who justly execrate the absurd Chinese custom of shaving the head"
  }
];

$('#dictionary').empty();
var html = '';
$.each(entries, function(){
  html += '<div class="entry">';
  html += '<h3 class="term">'+this['term']+'</h3>';
  html += '<div class="part">'+this['part']+'</div>';
  html += '<div class="defiition">'+this['definition'];
  if(this['quote']){
    html += '<div class="quote">';
    $.each(this['quote'], function(lineIndex, line){
      html += '<div class="quote-line">'+line+'</div>';
    });
    html += '</div>';
  }
  html += '</div>';
  html += '</div>';
  $('#dictionary').html(html);
});