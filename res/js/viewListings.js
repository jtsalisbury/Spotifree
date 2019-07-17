var curPage = 1;

var listings = [];

function createListing(data) {
  var url = 'http://u747950311.hostingerapp.com/househub/api/images/' + data["pid"] + "/0." + data["first_img_type"];

  var ele = `<div class='card mb-2'>
              <div class='card-horizontal' style='transform: rotate(0);'>
                  <div class='img-square-wrapper'>
                      <img class='card-img' src='` + url + `' alt='Property Image'>
                  </div>
                  <div class='card-body'>
                      <div class='d-flex'>
                        <h4 class='card-title'> ` + data["title"] + `</h4>` + (data["hidden"] == 1 ? "<span class='badge badge-secondary ml-auto' style='height: 20px'>Hidden</span>" : "") + `

                      </div>
                      <p class='card-text'>` + data["desc"] + `</p>
                      <p class='card-text'>Price: $` + data["base_price"] + `</p>

                      <a href='#' class='listingLink stretched-link' pid='` + data["pid"] + `'></a>
                  </div>
              </div>
              <div class="card-footer text-muted">
                <small class='text-muted'>Posted on ` + prettyDate(data["created"]) + " by <a href='#' uid='" + data["creator_uid"] + "' class='userLink'>" + data["creator_fname"] + " " + data["creator_lname"] + `</a></small>
              </div>
          </div>`;

  $(".listingsContainer").append(ele);
}

var priceSort = false;
var postSort = false;
function sortListings() {
  listings.sort(function(a, b) {
    if (priceSort) {
      return a["base_price"] - b["base_price"];
    }

    if (postSort) {
      return a["created"] - b["created"];
    }

    return b["pid"] - a["pid"];
     
  })
}

function populateListings() {
  $(".listingsContainer").empty();

  $.each(listings, function(i, e) {
    createListing(e);
  })
}

var listingCount = 0;
function requestListings(page, search, minPrice, maxPrice, saved, mine, targetUserID) {
  $("#noResults").hide();
  $("#loadMore").hide();

  var data = {
    "page": page,
    "search": search,
    "minPrice": minPrice,
    "maxPrice": maxPrice,
    "saved": saved,
    "mine": mine,
    "targetUserID": targetUserID,
    "show_hidden": mine
  };

  $("#loading").show();

  $.ajax({
    "url": "http://u747950311.hostingerapp.com/househub/site/res/php/doRequestListings.php",
    "type": "POST",
    "data": data,
    success: function(res) {

      console.log(res);
      var data = JSON.parse(res);

      console.log(data);

      if (data["status"] == "error") {
        return;
      }

      $("#loading").hide();

      if (data["listing_count"] == 0) {
        console.log("no results");
        $("#noResults").show();

      } else {
        $.each(data.listings, function(i, e) {
          listings.push(e);
        })

        sortListings();
        populateListings();
      }

      if (data["total_pages"] > curPage && data["total_pages"] != 0) {
        $("#loadMore").show();
      }

      listingCount += data["listing_count"];
      $(".listingCount").text("Showing 1 to " + listingCount + " of " + data["total_listings"] + " results");
    },
    error: function(res) {
      console.log("error");
      console.log(res);
    }

  })
}

requestListings(1, "", "", "", "", "", "");

var minPrice, maxPrice, saved, mine, search;
minPrice = maxPrice = saved = mine = search = "";

$(document).ready(function() {
  $("#noResults").hide();
  $("#loadMore").hide();

  $("#applyFilter").on("click", function(e) {
    e.preventDefault();

    $(".listingsContainer").empty();

    minPrice = $("#minPrice").val();
    maxPrice = $("#maxPrice").val();
    saved = $("#mySavedListings").is(":checked");
    mine  = $("#myListings").is(":checked");
    search = $("#searchText").val();

    curPage = 1;
    listingCount = 0;

    listings = [];

    requestListings(curPage, search, minPrice, maxPrice, saved, mine, "");
  })

  $("#mySavedListings").change(function() {
    if(this.checked) {
      $("#myListings").prop("checked", false);
    }
  });

  $("#myListings").change(function() {
    if(this.checked) {
      $("#mySavedListings").prop("checked", false);
    }
  });

  $("#doLoadMore").on("click", function(e) {
    curPage++;

    requestListings(curPage, search, minPrice, maxPrice, saved, mine, "");
  })

  $(".priceSort").on("click", function(e) {
    if (!$(this).hasClass("active")) {
      $(this).addClass("active");
      $(".postSort").removeClass("active");

      priceSort = true;
      postSort = false;
    } else {
      $(this).removeClass("active");

      priceSort = false;
    }

    sortListings();
    populateListings();
  })

  $(".postSort").on("click", function(e) {
    if (!$(this).hasClass("active")) {
      $(this).addClass("active");
      $(".priceSort").removeClass("active");

      postSort = true;
      priceSort = false;
    } else {
      $(this).removeClass("active");

      postSort = false;
    }

    sortListings();
    populateListings();
  })

  $(document).on("click", ".listingLink", function(e) {
    e.preventDefault();

    set("pid", $(this).attr("pid"));

    window.location.href = "./view.php";
  })

  $(document).on("click", ".userLink", function(e) {
    e.preventDefault();

    set("target_uid", $(this).attr("uid"));

    window.location.href = "../account/view.php";
  })
})