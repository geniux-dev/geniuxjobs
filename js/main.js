//prevent form resubmission when page is refreshed
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
//prevent form resubmission when page is refreshed

$(function() {
  var Accordion = function(el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find('.link');
    // Evento
    links.on('click', { el: this.el, multiple: this.multiple }, this.dropdown);
  };

  Accordion.prototype.dropdown = function(e) {
    var $el = e.data.el;
    ($this = $(this)), ($next = $this.next());

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el
        .find('.submenu')
        .not($next)
        .slideUp()
        .parent()
        .removeClass('open');
    }
  };

  var accordion = new Accordion($('#accordion'), false);
});

function informationtechnology() {
  document.getElementById('industry-span').innerHTML = 'Information Technology';
}
function buildingminingconstraction() {
  document.getElementById('industry-span').innerHTML = 'Mining & Construction';
}
function installationmainatance() {
  document.getElementById('industry-span').innerHTML =
    'Installation & Maintenance';
}
function southafrica() {
  document.getElementById('region-span').innerHTML = 'South Africa';
}
function limpopo() {
  document.getElementById('region-span').innerHTML = 'Limpopo';
}
function mpumalanga() {
  document.getElementById('region-span').innerHTML = 'Mpumalanga';
}
function gauteng() {
  document.getElementById('region-span').innerHTML = 'Gauteng';
}
function easterncape() {
  document.getElementById('region-span').innerHTML = 'Eastern Cape';
}
function northwest() {
  document.getElementById('region-span').innerHTML = 'North West';
}
function kzn() {
  document.getElementById('region-span').innerHTML = 'Kwazulu-Natal';
}
function freestate() {
  document.getElementById('region-span').innerHTML = 'Free State';
}
function northerncape() {
  document.getElementById('region-span').innerHTML = 'Northern Cape';
}
function westerncape() {
  document.getElementById('region-span').innerHTML = 'Western Cape';
}
function other() {
  document.getElementById('region-span').innerHTML = 'Other';
}

/* *************************************************************
    Custom JS scripts
****************************************************************/

jQuery(function($) {
  /* *************************************************************
    PULL-DOWN TABS
	****************************************************************/
  // Hide the up button on page load
  $(document).ready(function() {
    $('.pulldown-btn .fa-angle-double-up').hide();
  });
  // Toggle the pull-downs
  $('.pulldown-btn').click(function() {
    $(this)
      .siblings('div.pulldown-content')
      .slideToggle();
    $(this)
      .find('.fa-angle-double-down')
      .toggle();
    $(this)
      .find('.fa-angle-double-up')
      .toggle();
  });

  /* *************************************************************
    PROJECTS FILTER
	****************************************************************/
  $('#my-filter-cloud .my-tag').click(function() {
    var myFiltersList = [];
    var checkIfAnyOn = 0;
    var checkIfAnyOff = 0;

    // Get the tag-word- class on this filter tag
    var classes = $(this)
      .attr('class')
      .split(' ');
    for (var i = 0; i < classes.length; i++) {
      var matches = /^tag\-word\-(.+)/.exec(classes[i]);
      if (matches != null) {
        var tagwordclass = matches[1];
      }
    }

    // Test if filter tag is on or off
    if ($(this).hasClass('my-sel-off')) {
      // If the filter tag was off

      // Remove the 'off' style from the tag word
      $(this).removeClass('my-sel-off');
    } else {
      // If the filter tag was on

      // Add the 'off' style to the tag word
      $(this).addClass('my-sel-off');
    }

    // Go through the tag-word filter tags, and make a list of which tags are on
    $('#my-filter-cloud .my-tag').each(function() {
      if ($(this).hasClass('my-sel-off')) {
        checkIfAnyOff = 1;
      } else {
        checkIfAnyOn = 1;
        // Get the tag-word- class on this filter tag
        var classes = $(this)
          .attr('class')
          .split(' ');
        for (var i = 0; i < classes.length; i++) {
          var matches = /^tag\-word\-(.+)/.exec(classes[i]);
          if (matches != null) {
            var tagwordclasson = matches[1];
          }
        }
        // Add this tag word to the list of tag words for cards to show
        myFiltersList.push(tagwordclasson);
      }
    });

    //		console.log("myFiltersList: " + myFiltersList);
    //		console.log("checkIfAnyOn: " + checkIfAnyOn);
    //		console.log("checkIfAnyOff: " + checkIfAnyOff);

    // Turn on or off the 'all' or 'none' buttons as appropriate
    if (checkIfAnyOn === checkIfAnyOff) {
      // Add the 'off' style to the 'all' button
      $('#content-filter-select-all').addClass('filter-all-off');
      // Add the 'off' style to the 'none' button
      $('#content-filter-deselect-all').addClass('filter-all-off');
      // Hide the placeholder, since some card cards will be shown
      $('#card-placeholder').addClass('hide');
    } else if (checkIfAnyOn === 1) {
      // Remove the 'off' style from the 'all' button
      $('#content-filter-select-all').removeClass('filter-all-off');
      // Add the 'off' style to the 'none' button
      $('#content-filter-deselect-all').addClass('filter-all-off');
      // Hide the placeholder, since some card cards will be shown
      $('#card-placeholder').addClass('hide');
    } else {
      // Add the 'off' style to the 'all' button
      $('#content-filter-select-all').addClass('filter-all-off');
      // Remove the 'off' style from the 'none' button
      $('#content-filter-deselect-all').removeClass('filter-all-off');
      // Show the placeholder, since no card cards will be shown
      $('#card-placeholder').removeClass('hide');
    }

    // Hide or show cards according to the tag-word filter list
    $('#my-cards .my-card').each(function() {
      var showThisCard = 0;
      // Go through tag words on this card
      $(this)
        .find('.card-tags .my-tag')
        .each(function() {
          // Get the tag-word- class on this card tag
          var classes = $(this)
            .attr('class')
            .split(' ');
          for (var i = 0; i < classes.length; i++) {
            var matches = /^tag\-word\-(.+)/.exec(classes[i]);
            if (matches != null) {
              var cardtagwordclass = matches[1];
            }
          }
          $(this).addClass('my-sel-off');

          // Is it on the list of selected tag words?
          for (var i = 0; i < myFiltersList.length; i++) {
            if (myFiltersList[i] === cardtagwordclass) {
              showThisCard = 1;
              $(this).removeClass('my-sel-off');
            }
          }
        });

      // Hide or show this card
      if (showThisCard === 1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  // Clicking the 'all' tag-word cards filter button
  $('#content-filter-select-all').click(function() {
    // Turn on all tag-word filter tags
    $('#my-filter-cloud .my-tag').removeClass('my-sel-off');
    $('#my-cards .my-tag').removeClass('my-sel-off');

    // Turn on the 'all' btn
    $('#content-filter-select-all').removeClass('filter-all-off');

    // Make sure the 'none' btn is off
    $('#content-filter-deselect-all').addClass('filter-all-off');

    // Show all cards
    $('#my-cards .my-card').show();

    // Make sure the placeholder is hidden
    $('#card-placeholder').addClass('hide');
  });

  // Clicking the 'none' tag-word cards filter button
  $('#content-filter-deselect-all').click(function() {
    // Turn off all tag-word filter tags
    $('#my-filter-cloud .my-tag').addClass('my-sel-off');
    $('#my-cards .my-tag').addClass('my-sel-off');

    // Turn on the 'none' btn
    $('#content-filter-deselect-all').removeClass('filter-all-off');

    // Make sure the 'all' btn is off
    $('#content-filter-select-all').addClass('filter-all-off');

    // Hide all cards
    $('#my-cards .my-card').hide();

    // Show the placeholder
    $('#card-placeholder').removeClass('hide');
  });

  // Reset the tag-word cards filter when pull-down is closed
  $('#my-section .fa-angle-double-up').on('click', function() {
    // Turn on all tag-word filter tags
    $('#my-filter-cloud .my-tag').removeClass('my-sel-off');
    $('#my-cards .my-tag').removeClass('my-sel-off');

    // Turn on the 'all' btn
    $('#content-filter-select-all').removeClass('filter-all-off');

    // Make sure the 'none' btn is off
    $('#content-filter-deselect-all').addClass('filter-all-off');

    // Show all cards
    $('#my-cards .my-card').show();

    // Make sure the placeholder is hidden
    $('#card-placeholder').addClass('hide');
  });

  /* *************************************************************
    PROJECT CARDS EXPAND TABS
	****************************************************************/
  // Hide the up button on page load
  $(document).ready(function() {
    $('.my-card-expand-btn .fa-angle-double-up').hide();
  });
  // Toggle the pull-downs
  $('.my-card-expand-btn').click(function() {
    $(this)
      .siblings('div.my-card-expand-content')
      .slideToggle();
    $(this)
      .find('.fa-angle-double-down')
      .toggle();
    $(this)
      .find('.fa-angle-double-up')
      .toggle();

    $(this)
      .closest('.my-card')
      .toggleClass('expanded-my-card');
  });
});

console.clear();

class Dropdown {
  constructor(target) {
    this.target = target;
    this.clone = target.cloneNode(true);
    this.label = this.clone.querySelector('[data-block="label"]');
    this.options = this.clone.querySelectorAll('[data-block="option"]');
    this.selected = Array.from(this.options).filter(option =>
      option.hasAttribute('selected')
    );

    if (!this.selected.length) this.selected = this.options[0];

    this.generate();
  }

  eventListeners() {
    this.label.onclick = () => this.clone.classList.toggle('open');
    for (const opt of this.options) {
      opt.onclick = () => {
        this.label.textContent = opt.textContent;
        this.clone.classList.remove('open');
        this.clone.setAttribute('value', opt.getAttribute('value'));
        this.clone.value = opt.getAttribute('value');
        this.clone.dispatchEvent(this.events.change);
        this.clone.dispatchEvent(this.events.input);
      };
    }
  }

  populate() {
    this.clone.appendChild(this.menu);
    this.target.parentNode.insertBefore(this.clone, this.target);
    this.target.parentNode.removeChild(this.target);
  }

  generate() {
    if (!this.label.textContent)
      this.label.textContent = this.selected.textContent;
    this.clone.setAttribute('value', this.selected.getAttribute('value'));
    this.menu = document.createElement('div');
    this.events = {};
    this.events.change = new CustomEvent('change');
    this.events.input = new CustomEvent('input');

    for (const option of this.options) {
      this.menu.appendChild(option);
    }

    this.populate();

    this.menu.style.setProperty(
      '--expanded-height',
      `${this.menu.offsetHeight + this.menu.offsetTop}px`
    );
    this.menu.dataset.block = 'menu';

    this.eventListeners();
  }
}

for (const dropdown of document.querySelectorAll(
  '[data-component="dropdown"]'
)) {
  new Dropdown(dropdown);
}

/*
document.querySelector('.dd-1').addEventListener('change', e => {
  console.log(e.type + ': ' + document.querySelector('.dd-1').value);
});

document.querySelector('.dd-1').addEventListener('input', e => {
  console.log(e.type + ': ' + document.querySelector('.dd-1').value);
});

document.querySelector('html').classList.add('js');

var fileInput = document.querySelector('.input-file'),
  button = document.querySelector('.input-file-trigger'),
  the_return = document.querySelector('.file-return');

button.addEventListener('keydown', function(event) {
  if (event.keyCode == 13 || event.keyCode == 32) {
    fileInput.focus();
  }
});
button.addEventListener('click', function(event) {
  fileInput.focus();
  return false;
});
fileInput.addEventListener('change', function(event) {
  the_return.innerHTML = this.value;
});
*/
function scrolluperror() {
  $('.modal').animate({ scrollTop: 0 }, 'fast');
}

function toggleSignup() {
  document.getElementById('login-toggle').style.backgroundColor = '#fff';
  document.getElementById('login-toggle').style.color = '#222';
  document.getElementById('signup-toggle').style.backgroundColor = '#00aee4';
  document.getElementById('signup-toggle').style.color = '#fff';
  document.getElementById('login-form').style.display = 'none';
  document.getElementById('signup-form').style.display = 'none';
  document.getElementById('selectregForm').style.display = 'block';
  document.getElementById('signup-form-seeker').style.display = 'none';
}

function toggleLogin() {
  document.getElementById('login-toggle').style.backgroundColor = '#00aee4';
  document.getElementById('login-toggle').style.color = '#fff';
  document.getElementById('signup-toggle').style.backgroundColor = '#fff';
  document.getElementById('signup-toggle').style.color = '#222';
  document.getElementById('signup-form').style.display = 'none';
  document.getElementById('login-form').style.display = 'block';
  document.getElementById('selectregForm').style.display = 'none';
  document.getElementById('signup-form-seeker').style.display = 'none';
}

function selectFormEmployer() {
  document.getElementById('signup-form').style.display = 'block';
  document.getElementById('selectregForm').style.display = 'none';
  document.getElementById('signup-form-seeker').style.display = 'none';
  document.getElementById('login-form').style.display = 'none';
  document.getElementById('login-toggle').style.backgroundColor = '#fff';
  document.getElementById('login-toggle').style.color = '#222';
  document.getElementById('signup-toggle').style.backgroundColor = '#00aee4';
  document.getElementById('signup-toggle').style.color = '#fff';
  scrolluperror();
}
function signupFormSeeker() {
  document.getElementById('signup-form-seeker').style.display = 'block';
  document.getElementById('signup-form').style.display = 'none';
  document.getElementById('selectregForm').style.display = 'none';
  document.getElementById('login-form').style.display = 'none';
  document.getElementById('login-toggle').style.backgroundColor = '#fff';
  document.getElementById('login-toggle').style.color = '#222';
  document.getElementById('signup-toggle').style.backgroundColor = '#00aee4';
  document.getElementById('signup-toggle').style.color = '#fff';
  scrolluperror();
}

function manageVacancies() {
  document.getElementById('login-toggle1').style.backgroundColor = '#fff';
  document.getElementById('login-toggle1').style.color = '#222';
  document.getElementById('signup-toggle1').style.backgroundColor = '#00aee4';
  document.getElementById('signup-toggle1').style.color = '#fff';
  document.getElementById('login-form1').style.display = 'none';
  document.getElementById('signup-form1').style.display = 'block';
}

function postVacancies() {
  document.getElementById('login-toggle1').style.backgroundColor = '#00aee4';
  document.getElementById('login-toggle1').style.color = '#fff';
  document.getElementById('signup-toggle1').style.backgroundColor = '#fff';
  document.getElementById('signup-toggle1').style.color = '#222';
  document.getElementById('signup-form1').style.display = 'none';
  document.getElementById('login-form1').style.display = 'block';
}

function editjobseekerInfo() {
  $('.jobseekerinfoTable').css('display', 'table');
  $('.editjobseekerinfoTable').css('display', 'none');
}
function jobseekerInfo() {
  $('.jobseekerinfoTable').css('display', 'none');
  $('.editjobseekerinfoTable').css('display', 'table');
  scrolluperror();
}

function editEmployerInfo() {
  $('.jobseekerinfoTable').css('display', 'table');
  $('.editjobseekerinfoTable').css('display', 'none');
}

function employerInfo() {
  $('.jobseekerinfoTable').css('display', 'none');
  $('.editjobseekerinfoTable').css('display', 'table');
  scrolluperror();
}

function shakeFX() {
  var delayInMilliseconds = 900;
  setTimeout(function() {
    document.getElementById('loginresult').classList.add('shake');
  }, delayInMilliseconds);
  var delayInMilliseconds = 1200;
  setTimeout(function() {
    document.getElementById('loginresult').classList.remove('shake');
  }, delayInMilliseconds);
}
function postVacErrorShakeFX() {
  document.getElementById('post-vac-error').style.color = 'red';
  document.getElementById('regEm-error-vac').style.color = 'red';
  document.getElementById('post-vac-errormsg').style.color = 'red';
  document.getElementById('errormsgContactForm').style.color = 'red';
  var delayInMilliseconds = 900;
  setTimeout(function() {
    document.getElementById('post-vac-error').classList.add('shake');
    document.getElementById('regEm-error-vac').classList.add('shake');
    document.getElementById('post-vac-errormsg').classList.add('shake');
    document.getElementById('seekerUpdate-error').classList.add('shake');
    document.getElementById('employerUpdate-error').classList.add('shake');
    document.getElementById('errormsgContactForm').classList.add('shake');
  }, delayInMilliseconds);
  var delayInMilliseconds = 1200;
  setTimeout(function() {
    document.getElementById('post-vac-error').classList.remove('shake');
    document.getElementById('regEm-error-vac').classList.remove('shake');
    document.getElementById('post-vac-errormsg').classList.remove('shake');
    document.getElementById('seekerUpdate-error').classList.remove('shake');
    document.getElementById('employerUpdate-error').classList.remove('shake');
    document.getElementById('errormsgContactForm').classList.remove('shake');
  }, delayInMilliseconds);
}
function postVacErrorMSGShakeFX() {
  document.getElementById('post-vac-errormsg').style.color = 'red';
  var delayInMilliseconds = 900;
  setTimeout(function() {
    document.getElementById('post-vac-errormsg').classList.add('shake');
  }, delayInMilliseconds);
  var delayInMilliseconds = 1200;
  setTimeout(function() {
    document.getElementById('post-vac-errormsg').classList.remove('shake');
  }, delayInMilliseconds);
}

function validatePostVacancy() {
  $('#postvac-form').one('submit', function(event) {
    var e = document.getElementById('jobcategory');
    var jobindust = document.getElementById('jobindustry');
    var employtype = document.getElementById('selectemptype');

    if (document.getElementById('jobtitletxtbox').value.length < 3) {
      event.preventDefault();
      document.getElementById('jobtitletxtbox').focus();
      document.getElementById('jobtitletxtbox').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Job Title: ' +
        document.getElementById('jobtitletxtbox').value +
        ' is invalid';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (e.options[e.selectedIndex].value == 'selectcategory') {
      event.preventDefault();
      document.getElementById('jobcategory').focus();
      document.getElementById('jobcategory').style.border =
        '1px solid #ff0000cf';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Select Job Category';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (document.getElementById('minexptxtbox').value.length < 1) {
      event.preventDefault();
      document.getElementById('minexptxtbox').focus();
      document.getElementById('minexptxtbox').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Fill Required Experience';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (document.getElementById('salarytxtbox').value.length < 1) {
      event.preventDefault();
      document.getElementById('salarytxtbox').focus();
      document.getElementById('salarytxtbox').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Fill Salary Budget';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (
      jobindust.options[jobindust.selectedIndex].value == 'selectindustry'
    ) {
      event.preventDefault();
      document.getElementById('jobindustry').focus();
      document.getElementById('jobindustry').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Select Industry';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (document.getElementById('inputtextjobdesc').value.length < 1) {
      event.preventDefault();
      document.getElementById('inputtextjobdesc').focus();
      document.getElementById('inputtextjobdesc').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Briefly Fill Job Description';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (
      document.getElementById('inputtextjobdesc').value.length > 5000
    ) {
      event.preventDefault();
      document.getElementById('inputtextjobdesc').focus();
      document.getElementById('inputtextjobdesc').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Briefly Fill Job Description (5000 Words)';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (
      document.getElementById('educatxtbox').value.length == 0 ||
      document.getElementById('educatxtbox').value == ''
    ) {
      event.preventDefault();
      document.getElementById('educatxtbox').focus();
      document.getElementById('educatxtbox').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Fill Required Education';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (
      employtype.options[employtype.selectedIndex].value == 'selectemploytype'
    ) {
      event.preventDefault();
      document.getElementById('selectemptype').focus();
      document.getElementById('selectemptype').style.border =
        '1px solid #ff0000cf';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';

      document.getElementById('post-vac-errormsg').innerHTML =
        'Select Employment Type';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else if (!$("input[name='status']").is(':checked')) {
      event.preventDefault();
      document.getElementById('selectemptype').style.border = 'unset';
      document.getElementById('jobcategory').style.border = 'unset';
      document.getElementById('minexptxtbox').style.border = 'unset';
      document.getElementById('jobindustry').style.border = 'unset';
      document.getElementById('inputtextjobdesc').style.border = 'unset';
      document.getElementById('educatxtbox').style.border = 'unset';
      document.getElementById('salarytxtbox').style.border = 'unset';
      document.getElementById('jobtitletxtbox').style.border = 'unset';
      document.getElementById('post-vac-errormsg').innerHTML =
        'Choose Post Status';
      postVacErrorMSGShakeFX();
      scrolluperror();
    } else {
      document.getElementById('post-vac-errormsg').innerHTML = '';
      document.getElementById('posting-msg-success').innerHTML =
        'Posting... <i id="waiting" class="fa fa-cog fa-spin fa-3x fa-fw"></i>';
      $(this).submit();
    }
  });
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validateRegisterSeeker() {
  var email = document.getElementById('Seekeremail').value;
  var fileInput = document.getElementById('chooseFile');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.pdf|\.docx|\.doc|\.txt|\.rtf)$/i;
  $('#seekerRegForm').one('submit', function(event) {
    if (validateEmail(email)) {
      if (document.getElementById('SeekerFirstname').value.length < 2) {
        event.preventDefault();
        document.getElementById('SeekerFirstname').focus();
        document.getElementById('SeekerFirstname').style.border =
          '1px solid #ff0000cf';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('Seekerpassword').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'FirstName is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('SeekerLastname').value.length < 2) {
        event.preventDefault();
        document.getElementById('SeekerLastname').focus();
        document.getElementById('SeekerLastname').style.border =
          '1px solid #ff0000cf';
        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('Seekerpassword').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'Your LastName is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('Seekerpassword').value.length <= 5) {
        event.preventDefault();
        document.getElementById('Seekerpassword').focus();
        document.getElementById('Seekerpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'Password must contain minimum of 6 characters';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        document.getElementById('Seekerpassword').value !=
        document.getElementById('seekerConfirmpassword').value
      ) {
        event.preventDefault();
        document.getElementById('Seekerpassword').focus();
        document.getElementById('Seekerpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('seekerConfirmpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'Password doesnt match, Please Verify';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('qlf').value.length < 1) {
        event.preventDefault();
        document.getElementById('qlf').focus();
        document.getElementById('qlf').style.border = '1px solid #ff0000cf';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('Seekerpassword').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'Your Desired Job is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('dateofbirth').value.length < 10) {
        event.preventDefault();
        document.getElementById('dateofbirth').focus();
        document.getElementById('dateofbirth').style.border =
          '1px solid #ff0000cf';
        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('Seekerpassword').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'Invalid Date of Birth';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('cellnumber').value.length < 9) {
        event.preventDefault();
        document.getElementById('cellnumber').focus();
        document.getElementById('cellnumber').style.border =
          '1px solid #ff0000cf';
        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('Seekerpassword').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'Mobile/Tel is incorrect, Must have atleast 10 digits';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (!$("input[name='gender']").is(':checked')) {
        event.preventDefault();
        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('Seekerpassword').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'Gender is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (!allowedExtensions.exec(filePath)) {
        event.preventDefault();
        document.getElementById('cvUploadBox').focus();
        document.getElementById('cvUploadBox').style.border =
          '1px solid #ff0000cf';

        document.getElementById('SeekerFirstname').style.border = 'unset';
        document.getElementById('seekerConfirmpassword').style.border = 'unset';
        document.getElementById('Seekeremail').style.border = 'unset';
        document.getElementById('SeekerLastname').style.border = 'unset';
        document.getElementById('Seekerpassword').style.border = 'unset';
        document.getElementById('qlf').style.border = 'unset';
        document.getElementById('dateofbirth').style.border = 'unset';
        document.getElementById('cellnumber').style.border = 'unset';
        document.getElementById('post-vac-error').innerHTML =
          'CV/Resume returned 0, Please upload: PDF, DOC, DOCX, RTF/TXT';
        postVacErrorShakeFX();
        scrolluperror();
        fileInput.value = '';
        return false;
      } else {
        document.getElementById('post-vac-error').innerHTML = '';
        document.getElementById('posting-msg-success').innerHTML =
          'Successful  <i id="waiting" class="fa fa-cog fa-spin fa-3x fa-fw"></i>';
        $(this).submit();
      }
    } else {
      document.getElementById('post-vac-error').innerHTML =
        'Email: ' + email + ' Invalid';
      document.getElementById('Seekeremail').focus();
      document.getElementById('Seekeremail').style.border =
        '1px solid #ff0000cf';
      document.getElementById('SeekerFirstname').style.border = 'unset';
      document.getElementById('seekerConfirmpassword').style.border = 'unset';
      document.getElementById('SeekerLastname').style.border = 'unset';
      document.getElementById('Seekerpassword').style.border = 'unset';
      document.getElementById('qlf').style.border = 'unset';
      document.getElementById('dateofbirth').style.border = 'unset';
      document.getElementById('cellnumber').style.border = 'unset';
      postVacErrorShakeFX();
      scrolluperror();

      return false;
    }
  });
}

function validateRegisterEmployer() {
  var companyregion = document.getElementById('CRegion');
  var email = document.getElementById('emailEmployer').value;
  var fileInput = document.getElementById('image1');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.bmp)$/i;
  $('#regFormEmployer').one('submit', function(event) {
    if (validateEmail(email)) {
      if (!$("input[name='BusinessType']").is(':checked')) {
        event.preventDefault();
        document.getElementById('Companyname').style.border = 'unset';
        document.getElementById('CRegion').style.border = 'unset';
        document.getElementById('TelEmployer').style.border = 'unset';
        document.getElementById('Employerpassword').style.border = 'unset';
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('EmployerConfirmpassword').style.border =
          'unset';

        document.getElementById('regEm-error-vac').innerHTML =
          'Business Type is not checked';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('Companyname').value.length < 2) {
        event.preventDefault();
        document.getElementById('Companyname').focus();
        document.getElementById('Companyname').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmployerConfirmpassword').style.border =
          'unset';
        document.getElementById('CRegion').style.border = 'unset';
        document.getElementById('TelEmployer').style.border = 'unset';
        document.getElementById('Employerpassword').style.border = 'unset';
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('regEm-error-vac').innerHTML =
          'FirstName is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        companyregion.options[companyregion.selectedIndex].value ==
        'selectCRegionOptions'
      ) {
        event.preventDefault();
        document.getElementById('CRegion').focus();
        document.getElementById('CRegion').style.border = '1px solid #ff0000cf';
        document.getElementById('EmployerConfirmpassword').style.border =
          'unset';
        document.getElementById('Companyname').style.border = 'unset';
        document.getElementById('TelEmployer').style.border = 'unset';
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('Employerpassword').style.border = 'unset';
        document.getElementById('regEm-error-vac').innerHTML =
          'Company Region is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('TelEmployer').value.length < 1) {
        event.preventDefault();
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('TelEmployer').focus();
        document.getElementById('TelEmployer').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmployerConfirmpassword').style.border =
          'unset';
        document.getElementById('Companyname').style.border = 'unset';
        document.getElementById('CRegion').style.border = 'unset';
        document.getElementById('Employerpassword').style.border = 'unset';
        document.getElementById('regEm-error-vac').innerHTML =
          'Fill Mobile Phone';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('TelEmployer').value.length < 9) {
        event.preventDefault();
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('TelEmployer').focus();
        document.getElementById('TelEmployer').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmployerConfirmpassword').style.border =
          'unset';
        document.getElementById('Companyname').style.border = 'unset';
        document.getElementById('CRegion').style.border = 'unset';
        document.getElementById('Employerpassword').style.border = 'unset';
        document.getElementById('regEm-error-vac').innerHTML =
          'Mobile Phone is Incorrect, Must have aleast 10 digits';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        document.getElementById('Employerpassword').value.length <= 5
      ) {
        event.preventDefault();
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('Employerpassword').focus();

        document.getElementById('Employerpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmployerConfirmpassword').style.border =
          'unset';
        document.getElementById('Companyname').style.border = 'unset';
        document.getElementById('CRegion').style.border = 'unset';
        document.getElementById('TelEmployer').style.border = 'unset';
        document.getElementById('regEm-error-vac').innerHTML =
          'Password must contain minimum of 6 characters';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        document.getElementById('Employerpassword').value !=
        document.getElementById('EmployerConfirmpassword').value
      ) {
        event.preventDefault();
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('Employerpassword').focus();
        document.getElementById('Employerpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmployerConfirmpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('Companyname').style.border = 'unset';
        document.getElementById('CRegion').style.border = 'unset';
        document.getElementById('TelEmployer').style.border = 'unset';
        document.getElementById('regEm-error-vac').innerHTML =
          'Password doesnt match, Please verify';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (!allowedExtensions.exec(filePath)) {
        event.preventDefault();
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('Companyname').style.border = 'unset';
        document.getElementById('CRegion').style.border = 'unset';
        document.getElementById('TelEmployer').style.border = 'unset';
        document.getElementById('Employerpassword').style.border = 'unset';
        document.getElementById('EmployerConfirmpassword').style.border =
          'unset';
        document.getElementById('regEm-error-vac').innerHTML =
          'Image/Logo returned 0, Please upload: JPG, JPEG, PNG, BMP';
        postVacErrorShakeFX();
        scrolluperror();
        fileInput.value = '';
        return false;
      } else {
        document.getElementById('regEm-error-vac').innerHTML = '';
        document.getElementById('posting-msg-success').innerHTML =
          'Successful  <i id="waiting" class="fa fa-cog fa-spin fa-3x fa-fw"></i>';
        $(this).submit();
      }
    } else {
      document.getElementById('regEm-error-vac').innerHTML =
        'Email: ' + email + ' Invalid';
      document.getElementById('emailEmployer').focus();
      document.getElementById('emailEmployer').style.border =
        '1px solid #ff0000cf';
      document.getElementById('Companyname').style.border = 'unset';
      document.getElementById('CRegion').style.border = 'unset';
      document.getElementById('TelEmployer').style.border = 'unset';
      document.getElementById('Employerpassword').style.border = 'unset';
      document.getElementById('EmployerConfirmpassword').style.border = 'unset';
      postVacErrorShakeFX();
      scrolluperror();

      return false;
    }
  });
}

function keepCV() {
  document.getElementById('cVfileUpload').style.display = 'none';
  document.getElementById('existinCVP').style.display = 'block';
  document.getElementById('uploadNewP').style.display = 'none';
}
function cVupdate() {
  document.getElementById('cVfileUpload').style.display = 'block';
  document.getElementById('uploadNewP').style.display = 'block';
  document.getElementById('existinCVP').style.display = 'none';
}
keepCV();
function keepLogo() {
  document.getElementById('logofileUpload').style.display = 'none';
  document.getElementById('existinLogo').style.display = 'block';
  document.getElementById('uploadNewLogoP').style.display = 'none';
  document.getElementById('ElogoIcon').style.display = 'block';
}
function logoUpd() {
  document.getElementById('logofileUpload').style.display = 'block';
  document.getElementById('uploadNewLogoP').style.display = 'block';
  document.getElementById('existinLogo').style.display = 'none';
  document.getElementById('ElogoIcon').style.display = 'none';
}
keepLogo();

function seekerEditProfile() {
  var email = document.getElementById('Semailupd').value;
  var fileInput = document.getElementById('FileUpdateResume');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.pdf|\.docx|\.doc|\.txt|\.rtf)$/i;
  $('#seekerEditProfileForm').one('submit', function(event) {
    if (validateEmail(email)) {
      if (document.getElementById('Snameupd').value.length < 2) {
        event.preventDefault();
        document.getElementById('Snameupd').focus();
        document.getElementById('Snameupd').style.border =
          '1px solid #ff0000cf';
        document.getElementById('Slastnameupd').style.border = 'unset';
        document.getElementById('Sdateofbirthupd').style.border = 'unset';
        document.getElementById('Sdesiredjob').style.border = 'unset';
        document.getElementById('Semailupd').style.border = 'unset';
        document.getElementById('Scellphoneupd').style.border = 'unset';
        document.getElementById('sOldpassword').style.border = 'unset';
        document.getElementById('SNewPassword').style.border = 'unset';
        document.getElementById('cVfileUpload').style.border = 'unset';
        document.getElementById('seekerUpdate-error').innerHTML =
          'First Name is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('Slastnameupd').value.length < 2) {
        event.preventDefault();

        document.getElementById('Slastnameupd').focus();
        document.getElementById('Slastnameupd').style.border =
          '1px solid #ff0000cf';
        document.getElementById('Sdateofbirthupd').style.border = 'unset';
        document.getElementById('Sdesiredjob').style.border = 'unset';
        document.getElementById('Semailupd').style.border = 'unset';
        document.getElementById('Scellphoneupd').style.border = 'unset';
        document.getElementById('sOldpassword').style.border = 'unset';
        document.getElementById('SNewPassword').style.border = 'unset';
        document.getElementById('cVfileUpload').style.border = 'unset';

        document.getElementById('seekerUpdate-error').innerHTML =
          'Last Name is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('Sdateofbirthupd').value.length < 10) {
        event.preventDefault();
        document.getElementById('Sdateofbirthupd').focus();
        document.getElementById('Sdateofbirthupd').style.border =
          '1px solid #ff0000cf';
        document.getElementById('Slastnameupd').style.border = 'unset';
        document.getElementById('Sdesiredjob').style.border = 'unset';
        document.getElementById('Semailupd').style.border = 'unset';
        document.getElementById('Scellphoneupd').style.border = 'unset';
        document.getElementById('sOldpassword').style.border = 'unset';
        document.getElementById('SNewPassword').style.border = 'unset';
        document.getElementById('cVfileUpload').style.border = 'unset';
        document.getElementById('seekerUpdate-error').innerHTML =
          'Date Of Birth is Incorrect';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('Sdesiredjob').value.length < 2) {
        event.preventDefault();
        document.getElementById('Sdesiredjob').focus();
        document.getElementById('Sdesiredjob').style.border =
          '1px solid #ff0000cf';
        document.getElementById('Slastnameupd').style.border = 'unset';
        document.getElementById('Semailupd').style.border = 'unset';
        document.getElementById('Scellphoneupd').style.border = 'unset';
        document.getElementById('sOldpassword').style.border = 'unset';
        document.getElementById('SNewPassword').style.border = 'unset';
        document.getElementById('cVfileUpload').style.border = 'unset';
        document.getElementById('seekerUpdate-error').innerHTML =
          'Desired Job is Missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('Scellphoneupd').value.length < 10) {
        event.preventDefault();
        document.getElementById('Scellphoneupd').focus();
        document.getElementById('Scellphoneupd').style.border =
          '1px solid #ff0000cf';
        document.getElementById('Slastnameupd').style.border = 'unset';
        document.getElementById('Semailupd').style.border = 'unset';
        document.getElementById('sOldpassword').style.border = 'unset';
        document.getElementById('SNewPassword').style.border = 'unset';
        document.getElementById('cVfileUpload').style.border = 'unset';
        document.getElementById('seekerUpdate-error').innerHTML =
          'Mobile Phone is Incorrect, Must have aleast 10 digits';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        document.getElementById('SNewPassword').value.length <= 5 &&
        document.getElementById('sOldpassword').value.length >= 1
      ) {
        event.preventDefault();
        document.getElementById('emailEmployer').style.border = 'unset';
        document.getElementById('SNewPassword').focus();
        document.getElementById('sOldpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('SNewPassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('Slastnameupd').style.border = 'unset';
        document.getElementById('Semailupd').style.border = 'unset';
        document.getElementById('Scellphoneupd').style.border = 'unset';
        document.getElementById('sOldpassword').style.border = 'unset';
        document.getElementById('SNewPassword').style.border = 'unset';
        document.getElementById('cVfileUpload').style.border = 'unset';
        document.getElementById('seekerUpdate-error').innerHTML =
          'New Password must contain minimum of 6 characters';
        postVacErrorShakeFX();
        scrolluperror();
      } else {
        if ($('input[name=cvUpdate]:checked').val() == 'UploadNew') {
          if (!allowedExtensions.exec(filePath)) {
            event.preventDefault();
            document.getElementById('cVfileUpload').focus();
            document.getElementById('cVfileUpload').style.border =
              '1px solid #ff0000cf';
            document.getElementById('Slastnameupd').style.border = 'unset';
            document.getElementById('Semailupd').style.border = 'unset';
            document.getElementById('sOldpassword').style.border = 'unset';
            document.getElementById('SNewPassword').style.border = 'unset';

            document.getElementById('seekerUpdate-error').innerHTML =
              'CV/Resume returned 0, Please upload: PDF, DOC, DOCX, RTF/TXT';
            postVacErrorShakeFX();
            scrolluperror();
            fileInput.value = '';
            return false;
          }
        } else if ($('input[name=cvUpdate]:checked').val() == 'KeepExisting') {
          document.getElementById('seekerUpdate-error').innerHTML = '';

          $(this).submit();
        }
      }
    } else {
      document.getElementById('seekerUpdate-error').innerHTML =
        'Email: ' + email + ' Invalid';
      document.getElementById('Semailupd').focus();
      document.getElementById('Semailupd').style.border = '1px solid #ff0000cf';
      document.getElementById('Slastnameupd').style.border = 'unset';

      document.getElementById('sOldpassword').style.border = 'unset';
      document.getElementById('SNewPassword').style.border = 'unset';
      document.getElementById('cVfileUpload').style.border = 'unset';
      postVacErrorShakeFX();
      scrolluperror();

      return false;
    }
  });
}

function updateEmployerInfo() {
  var email = document.getElementById('EmEmail').value;
  var fileInput = document.getElementById('updImageLogo');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.bmp)$/i;
  $('#employerEditProfileForm').one('submit', function(event) {
    if (validateEmail(email)) {
      if (document.getElementById('Enameupd').value.length < 2) {
        event.preventDefault();
        document.getElementById('Enameupd').focus();
        document.getElementById('Enameupd').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmpTel').style.border = 'unset';
        document.getElementById('EOldpassword').style.border = 'unset';
        document.getElementById('ENewPassword').style.border = 'unset';
        document.getElementById('EmEmail').style.border = 'unset';
        document.getElementById('logofileUpload').style.border = 'unset';
        document.getElementById('employerUpdate-error').innerHTML =
          'First Name is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('EmpTel').value.length < 10) {
        event.preventDefault();
        document.getElementById('EmpTel').focus();
        document.getElementById('EmpTel').style.border = '1px solid #ff0000cf';
        document.getElementById('EOldpassword').style.border = 'unset';
        document.getElementById('EmEmail').style.border = 'unset';
        document.getElementById('Enameupd').style.border = 'unset';
        document.getElementById('ENewPassword').style.border = 'unset';
        document.getElementById('logofileUpload').style.border = 'unset';
        document.getElementById('employerUpdate-error').innerHTML =
          'Mobile/Tel Phone is Incorrect, Must have aleast 10 digits';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        document.getElementById('ENewPassword').value.length <= 5 &&
        document.getElementById('EOldpassword').value.length >= 1
      ) {
        event.preventDefault();
        document.getElementById('ENewPassword').focus();
        document.getElementById('EOldpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('ENewPassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmpTel').style.border = 'unset';
        document.getElementById('Enameupd').style.border = 'unset';
        document.getElementById('EmEmail').style.border = 'unset';
        document.getElementById('logofileUpload').style.border = 'unset';
        document.getElementById('employerUpdate-error').innerHTML =
          'New Password must contain minimum of 6 characters';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        document.getElementById('ENewPassword').value.length > 0 &&
        document.getElementById('EOldpassword').value.length == 0
      ) {
        event.preventDefault();

        document.getElementById('EOldpassword').focus();
        document.getElementById('EOldpassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('ENewPassword').style.border =
          '1px solid #ff0000cf';
        document.getElementById('EmpTel').style.border = 'unset';
        document.getElementById('Enameupd').style.border = 'unset';
        document.getElementById('EmEmail').style.border = 'unset';
        document.getElementById('logofileUpload').style.border = 'unset';
        document.getElementById('employerUpdate-error').innerHTML =
          'Please enter your old password';
        postVacErrorShakeFX();
        scrolluperror();
      } else {
        if ($('input[name=updateLogo]:checked').val() == 'UploadNew') {
          if (!allowedExtensions.exec(filePath)) {
            event.preventDefault();
            document.getElementById('logofileUpload').focus();
            document.getElementById('logofileUpload').style.border =
              '1px solid #ff0000cf';
            document.getElementById('EOldpassword').style.border = 'unset';
            document.getElementById('EmEmail').style.border = 'unset';
            document.getElementById('ENewPassword').style.border = 'unset';
            document.getElementById('Enameupd').style.border = 'unset';

            document.getElementById('employerUpdate-error').innerHTML =
              'Image/Logo returned 0, Please upload: JPG, JPEG, PNG, BMP';
            postVacErrorShakeFX();
            scrolluperror();
            fileInput.value = '';
            return false;
          }
        } else if (
          $('input[name=updateLogo]:checked').val() == 'KeepExisting'
        ) {
          document.getElementById('employerUpdate-error').innerHTML = '';

          $(this).submit();
        }
      }
    } else {
      document.getElementById('employerUpdate-error').innerHTML =
        'Email: ' + email + ' Invalid';
      document.getElementById('EmEmail').focus();
      document.getElementById('EmEmail').style.border = '1px solid #ff0000cf';

      document.getElementById('Enameupd').style.border = 'unset';
      document.getElementById('EOldpassword').style.border = 'unset';
      document.getElementById('ENewPassword').style.border = 'unset';
      document.getElementById('logofileUpload').style.border = 'unset';
      postVacErrorShakeFX();
      scrolluperror();

      return false;
    }
  });
}

function validateContactForm() {
  var email = document.getElementById('contactEmail').value;

  $('#contactForm').one('submit', function(event) {
    if (validateEmail(email)) {
      if (document.getElementById('contactname').value.length < 2) {
        event.preventDefault();
        document.getElementById('contactname').focus();
        document.getElementById('contactname').style.border =
          '1px solid #ff0000cf';
        document.getElementById('contactSubject').style.border = 'unset';
        document.getElementById('messageContactFrom').style.border = 'unset';
        document.getElementById('contactEmail').style.border = 'unset';

        document.getElementById('errormsgContactForm').innerHTML =
          'Name is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (document.getElementById('contactSubject').value.length < 2) {
        event.preventDefault();
        document.getElementById('contactSubject').focus();
        document.getElementById('contactSubject').style.border =
          '1px solid #ff0000cf';
        document.getElementById('contactname').style.border = 'unset';
        document.getElementById('messageContactFrom').style.border = 'unset';
        document.getElementById('contactEmail').style.border = 'unset';

        document.getElementById('errormsgContactForm').innerHTML =
          'Subject is missing';
        postVacErrorShakeFX();
        scrolluperror();
      } else if (
        document.getElementById('messageContactFrom').value.length < 2
      ) {
        event.preventDefault();
        document.getElementById('messageContactFrom').focus();
        document.getElementById('messageContactFrom').style.border =
          '1px solid #ff0000cf';
        document.getElementById('contactname').style.border = 'unset';
        document.getElementById('contactSubject').style.border = 'unset';
        document.getElementById('contactEmail').style.border = 'unset';

        document.getElementById('errormsgContactForm').innerHTML =
          'Briefly tells us how we can assist you';
        postVacErrorShakeFX();
        scrolluperror();
      } else {
        $(this).submit();
      }
    } else {
      document.getElementById('errormsgContactForm').innerHTML =
        'Email: ' + email + ' Invalid';
      document.getElementById('contactEmail').focus();
      document.getElementById('contactEmail').style.border =
        '1px solid #ff0000cf';
      document.getElementById('contactname').style.border = 'unset';
      document.getElementById('contactSubject').style.border = 'unset';
      document.getElementById('messageContactFrom').style.border = 'unset';

      postVacErrorShakeFX();
      scrolluperror();

      return false;
    }
  });
}
