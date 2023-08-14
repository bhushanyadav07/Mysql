  // Check if the month is February
  if ($month == 2) {
    // Check if the year is a leap year
    if ($year % 4 == 0) {
      // February has 29 days in a leap year
      return 29;
    } else {
      // February has 28 days in a non-leap year
      return 28;
    }
  } else if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
    // These months have 31 days
    return 31;
  } else {
    // These months have 30 days
    return 30;
  }
}

// Get the current year
$year = date('Y');

// Loop through the months
for ($i = 1; $i <= 12; $i++) {
  // Get the number of days in the month
  $days = get_days_in_month($i, $year);

  // Print the month and the number of days
  echo "$i has $days days\n";
}

*******************************************

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        // Try to get articles from cache
        $articles = Cache::remember('articles', 60, function () {
            // Cache miss: Fetch articles from the database
            return Article::orderBy('created_at', 'desc')->get();
        });

        return view('articles.index', compact('articles'));
    }
}
