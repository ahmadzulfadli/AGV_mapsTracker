from django.contrib import admin
from django.urls import path
from agv_position.views import *
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', agv_position, name='agv_position'),
    path('api/agv_position/', agv_position_api, name='agv_position_api'),
]
if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL,
                          document_root=settings.MEDIA_ROOT)
