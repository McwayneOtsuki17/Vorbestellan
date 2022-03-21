from django.conf import settings
from django.conf.urls.static import static
from django.views.generic.base import RedirectView
from django.conf.urls import url
from django.urls import path
from vorbestellenapp import views

app_name = 'vorbestellenapp'

urlpatterns = [
    url(r'^favicon\.ico$',RedirectView.as_view(url='/static/images/favicon.ico')),
    path('', views.IndexView.as_view(), name="index_view"),
    path('logout/', views.logout, name='logout'),
    path('removefilter/', views.removefilter, name='removefilter'),
    path('removefilterbook/', views.removefilterbook, name='removefilterbook'),
    path('removefilterdate/', views.removefilterdate, name='removefilterdate'),
    path('about/', views.AboutView.as_view(), name="about_view"),
    path('contact/', views.ContactView.as_view(), name="contact_view"),
    path('admin/', views.AdminView.as_view(), name="admin_view"),
    path('pricing/', views.PriceView.as_view(), name="pricing_view"), 
    path('signup/', views.SignUpView.as_view(), name="signup_view"),
    path('account/', views.AccountView.as_view(), name="account_view"),
    path('rooms/', views.RoomsView.as_view(), name="rooms_view"),
    path('booking/', views.BookingView.as_view(), name="booking_view"),
    path('managebookings/', views.MngBkngsView.as_view(), name="managebookings_view"),
    path('manageusers/', views.MngUsersView.as_view(), name="manageusers_view"),
    path('vacantrooms/', views.VacantRoomsView.as_view(), name="vacantrooms_view"),
] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)