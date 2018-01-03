<?php namespace fundstarter\storage;
 
use Illuminate\Support\ServiceProvider;
 
class StorageServiceProvider extends ServiceProvider {
 
  public function register()
  {
    $this->app->bind(
      'fundstarter\storage\Admin\IAdminRepository',
      'fundstarter\storage\Admin\AdminRepository'
    );
     $this->app->bind(
      'fundstarter\storage\Adminsetting\IAdminsettingRepository',
      'fundstarter\storage\Adminsetting\AdminsettingRepository'
    );
     $this->app->bind(
      'fundstarter\storage\Backing\IBackingRepository',
      'fundstarter\storage\Backing\BackingRepository'
    );
     $this->app->bind(
      'fundstarter\storage\Category\ICategoryRepository',
      'fundstarter\storage\Category\CategoryRepository'
    );
      $this->app->bind(
      'fundstarter\storage\City\ICityRepository',
      'fundstarter\storage\City\CityRepository'
    );
      $this->app->bind(
      'fundstarter\storage\Comment\ICommentRepository',
      'fundstarter\storage\Comment\CommentRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Contact\IContactRepository',
      'fundstarter\storage\Contact\ContactRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Country\ICountryRepository',
      'fundstarter\storage\Country\CountryRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Currency\ICurrencyRepository',
      'fundstarter\storage\Currency\CurrencyRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Inboxmsg\IInboxmsgRepository',
      'fundstarter\storage\Inboxmsg\InboxmsgRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Payment\IPaymentRepository',
      'fundstarter\storage\Payment\PaymentRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Paymentgateway\IPaymentgatewayRepository',
      'fundstarter\storage\Paymentgateway\PaymentgatewayRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Paymenthost\IPaymenthostRepository',
      'fundstarter\storage\Paymenthost\PaymenthostRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Prefooter\IPrefooterRepository',
      'fundstarter\storage\Prefooter\PrefooterRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Project\IProjectRepository',
      'fundstarter\storage\Project\ProjectRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Reward\IRewardRepository',
      'fundstarter\storage\Reward\RewardRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Sendmsg\ISendmsgRepository',
      'fundstarter\storage\Sendmsg\SendmsgRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Slider\ISliderRepository',
      'fundstarter\storage\Slider\SliderRepository'
    );
       $this->app->bind(
      'fundstarter\storage\State\IStateRepository',
      'fundstarter\storage\State\StateRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Staticpage\IStaticpageRepository',
      'fundstarter\storage\Staticpage\StaticpageRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Subscription\ISubscriptionRepository',
      'fundstarter\storage\Subscription\SubscriptionRepository'
    );
       $this->app->bind(
      'fundstarter\storage\User\IUserRepository',
      'fundstarter\storage\User\UserRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Subcategory\ISubcategoryRepository',
      'fundstarter\storage\Subcategory\SubcategoryRepository'
    );
       $this->app->bind(
      'fundstarter\storage\Newsletter\INewsletterRepository',
      'fundstarter\storage\Newsletter\NewsletterRepository'
    );
        $this->app->bind(
      'fundstarter\storage\Update\IUpdateRepository',
      'fundstarter\storage\Update\UpdateRepository'
    );
        
      $this->app->bind(
      'fundstarter\storage\Faq\IFaqRepository',
      'fundstarter\storage\Faq\FaqRepository'
    );
      
      $this->app->bind(
      'fundstarter\storage\Like\ILikeRepository',
      'fundstarter\storage\Like\LikeRepository'
    );
      
        $this->app->bind(
      'fundstarter\storage\Follow\IFollowRepository',
      'fundstarter\storage\Follow\FollowRepository'
    );
        
                $this->app->bind(
      'fundstarter\storage\Followproject\IFollowprojectRepository',
      'fundstarter\storage\Followproject\FollowprojectRepository'
    );
       
        $this->app->bind(
      'fundstarter\storage\Membership\IMembershipRepository',
      'fundstarter\storage\Membership\MembershipRepository'
    );
        
        $this->app->bind(
      'fundstarter\storage\Projectview\IProjectviewRepository',
      'fundstarter\storage\Projectview\ProjectviewRepository'
    );
        
  }
 
}