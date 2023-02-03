from django.shortcuts import render
from .models import AGV, maps


def agv_position(request):
    agv = AGV.objects.last()
    peta = maps.objects.all()
    context = {'agv': agv,'peta':peta}
    return render(request, 'agv_position.html', context)
