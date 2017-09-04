<script>
      function ulSearchBox1() {
          // Declare variables
          var input, filter, ul, li, a, i;
          input = document.getElementById('itemSearchBox1');
          filter = input.value.toUpperCase();
          ul = document.getElementById("ulItems1");
          li = ul.getElementsByTagName('li');

          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("label")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
              } else {
                  li[i].style.display = "none";
              }
          }
      };

      function ulSearchBox2() {
          // Declare variables
          var input, filter, ul, li, a, i;
          input = document.getElementById('itemSearchBox2');
          filter = input.value.toUpperCase();
          ul = document.getElementById("ulItems2");
          li = ul.getElementsByTagName('li');

          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("label")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
              } else {
                  li[i].style.display = "none";
              }
          }
      };

      function ulSearchBox3() {
          // Declare variables
          var input, filter, ul, li, a, i;
          input = document.getElementById('itemSearchBox3');
          filter = input.value.toUpperCase();
          ul = document.getElementById("ulItems3");
          li = ul.getElementsByTagName('li');

          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("label")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
              } else {
                  li[i].style.display = "none";
              }
          }
      };

      function ulSearchBox4() {
          // Declare variables
          var input, filter, ul, li, a, i;
          input = document.getElementById('itemSearchBox4');
          filter = input.value.toUpperCase();
          ul = document.getElementById("ulItems4");
          li = ul.getElementsByTagName('li');

          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("label")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
              } else {
                  li[i].style.display = "none";
              }
          }
      };

      function ulSearchBox5() {
          // Declare variables
          var input, filter, ul, li, a, i;
          input = document.getElementById('itemSearchBox5');
          filter = input.value.toUpperCase();
          ul = document.getElementById("ulItems5");
          li = ul.getElementsByTagName('li');

          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("label")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
              } else {
                  li[i].style.display = "none";
              }
          }
      };
  </script>
