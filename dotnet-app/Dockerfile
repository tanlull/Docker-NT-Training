FROM mcr.microsoft.com/dotnet/sdk:6.0 AS build
WORKDIR /app
#COPY *.sln ./
COPY *.csproj ./
RUN dotnet restore
COPY ./ ./
RUN dotnet publish -c Release -o out --no-restore

#production 
FROM mcr.microsoft.com/dotnet/aspnet:6.0 
WORKDIR /app
COPY --from=build /app/out .
ENTRYPOINT [ "dotnet","dotnet-app.dll"]