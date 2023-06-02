function getDaysInMonth($month, $year) {

  // Check for leap years
  if (is_leap_year($year)) {
    if ($month == 2) {
      $days = 29;
    } else {
      $days = 31;
    }
  } else {
    switch ($month) {
      case 1:
      case 3:
      case 5:
      case 7:
      case 8:
      case 10:
      case 12:
        $days = 31;
        break;
      case 2:
        $days = 28;
        break;
      default:
        $days = 30;
        break;
    }
  }

  return $days;

}

// Check if the year is a leap year
function is_leap_year($year) {

  // Check if the year is divisible by 4
  if ($year % 4 == 0) {
    // Check if the year is divisible by 100
    if ($year % 100 == 0) {
      // Check if the year is divisible by 400
      if ($year % 400 == 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return true;
    }
  } else {
    return false;
  }

}

// Get the current month and year
$month = date("m");
$year = date("Y");

// Get the number of days in the current month
$daysInMonth = getDaysInMonth($month, $year);

// Print the number of days in the current month
echo "There are " . $daysInMonth . " days in this month.";
