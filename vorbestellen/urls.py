from django.urls import include, path
from django.conf.urls.static import static
from django.conf import settings

urlpatterns = [
    path('', include('vorbestellenapp.urls', namespace='vorbestellenapp')), 
]+ static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT) 
