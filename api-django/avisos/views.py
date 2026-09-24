from rest_framework import permissions, viewsets

from .models import Aviso
from .serializers import AvisoSerializer
from rest_framework.decorators import api_view, permission_classes
from rest_framework.response import Response


class AvisoViewSet(viewsets.ModelViewSet):
    queryset = Aviso.objects.filter(publicado=True).select_related("categoria", "autor")
    serializer_class = AvisoSerializer

    def perform_create(self, serializer):
        serializer.save(autor=self.request.user)

@api_view(["GET"])
@permission_classes([permissions.IsAuthenticatedOrReadOnly, EsAutorOAdmin])
def yo(request):
    return Response({
        "id": request.user.id,
        "nombre": request.user.username,
        "rol": "admin" if request.user.is_staff else "autor",
    })
